<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\State;
use App\Models\Country;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\UserOrderInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DropdownController extends Controller
{
    public $showCheckoutButton = false;

    /**
     * Show the form with dropdowns for countries, states, and cities.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['countries'] = Country::get(["name", "id"]);
        return view('dropdown', $data);
    }

    /**
     * Fetch states based on country id.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }

    /**
     * Fetch cities based on state id.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }

    /**
     * Save the user order info to the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveUserOrderInfo(Request $request)
    {
        // Validate the request first
        $validatedData = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'phone_number' => 'required|string|max:15',
            'address_line' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
        ]);

        // Get the authenticated user ID
        $userId = Auth::id();

        // Check if the user already has a cart to prevent duplicate entries
        $existingCart = Cart::where('user_id', $userId)->first();

        if (!$existingCart) {
            // Create a new cart for the user
            $cart = Cart::create([
                'user_id' => $userId,
            ]);
        } else {
            $cart = $existingCart;
        }

        // Retrieve the cart cookie
        $cartCookie = $_COOKIE['cart'] ?? null;

        if ($cartCookie) {
            // Parse the cookie using native PHP
            $cartItems = json_decode($cartCookie, true);

            if (is_array($cartItems) && !empty($cartItems)) {
                // Extract product IDs and quantities from the cart
                foreach ($cartItems as $item) {
                    // Check if $item is an array and has the 'id' and 'quantity' keys
                    if (is_array($item) && isset($item['id']) && isset($item['quantity'])) {
                        $productId = $item['id'];
                        $quantity = $item['quantity'];

                        // Insert or update the cart items in the database
                        CartItem::updateOrInsert(
                            [
                                'cart_id' => $cart->id,
                                'product_id' => $productId,
                            ],
                            [
                                'quantity' => $quantity,
                                'updated_at' => now(),
                            ]
                        );
                    }
                }
            }
        }

        $this->showCheckoutButton = true;

        // Get the cart items for the user
        $cartProducts = $cart->cartItems;

        // Calculate total price
        $totalPrice = 0;
        foreach ($cartProducts as $cartProduct) {
            $totalPrice += $cartProduct->quantity * $cartProduct->product->price;
        }

        // Create the order
        $order = new Order();
        $order->status = 'unpaid';
        $order->total = $totalPrice;
        $order->user_id = $userId;
        $order->save();

        // Save the products that the user ordered
        foreach ($cartProducts as $cartProduct) {
            DB::table('order_items')->insert([
                'order_id' => $order->id,
                'product_id' => $cartProduct->product->id,
                'price' => $cartProduct->product->price,
                'quantity' => $cartProduct->quantity,
            ]);
        }

        // Add the order ID to the validated data
        $validatedData['order_id'] = $order->id;

        // Save user order info
        UserOrderInfo::create($validatedData);
        session()->put('order_id', $order->id);
        return redirect()->route('subnitcheckout');

        // return redirect()->back()->with('success', 'User order info saved successfully.');
    }
}
