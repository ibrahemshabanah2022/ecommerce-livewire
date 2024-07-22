<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Stripe\StripeClient;
use App\Models\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Illuminate\Support\Facades\Cookie;


// require 'vendor/autoload.php';


class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();

        // Get the cart for the user
        $cart = $user->cart;

        // Get the cart product 
        $cartProducts = $cart->cartItems()->get();
        // dd($cartProducts);
        // $products = Product::whereIn('id', $cartProducts->pluck('product_id'))->get();

        $totalprice = 0;
        $lineItems = [];
        foreach ($cartProducts as $cartProduct) {
            $totalprice += $cartProduct->quantity * $cartProduct->product->price;

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $cartProduct->product->name,
                    ],
                    'unit_amount' =>  intval($cartProduct->product->price * 100),
                ],
                'quantity' => $cartProduct->quantity,
            ];
        }
        // dd($lineItems);
        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

        $user_id = $user->id;

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
            // 'success_url' => 'http://localhost:5173/PaymentSuccessPage?session_id={CHECKOUT_SESSION_ID}',
            // 'cancel_url' => 'http://example.com',
            'payment_method_types' => ['card'],
            'submit_type' => 'pay',
        ]);

        $order = new Order();
        $order->status = 'unpaid';
        $order->total = $totalprice;
        $order->user_id =  $user_id;
        $order->session_id =   $checkout_session->id;
        $order->save();
        // Save the products that the user ordered
        foreach ($cartProducts as $cartProduct) {
            DB::table('order_items')->insert([
                'order_id' => $order->id,
                'Product_id' => $cartProduct->product->id,
                'price' => $cartProduct->product->price,

                'quantity' => $cartProduct->quantity,
            ]);
        }
        return redirect($checkout_session->url);

        // return response()->json([
        //     'url' =>  $checkout_session->url
        // ]);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');


        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        if (!$session) {
            throw new NotFoundHttpException;
        }
        // $customer = \Stripe\Customer::retrieve($session->customer);

        $order = Order::where('session_id', $session->id)->first();
        if (!$order) {
            throw new NotFoundHttpException();
        }
        if ($order->status === 'unpaid') {
            $order->status = 'paid';
            $order->save();
        }

        $user_id = $order->user_id;
        $cart = Cart::where('user_id', $user_id)->first();


        $cartId = $cart->id;
        // dd($cartId);
        $cart->cartItems()->where('cart_id', $cartId)->delete();


        Cookie::queue(Cookie::forget('cart'));


        return view('checkout-success');
    }
}
