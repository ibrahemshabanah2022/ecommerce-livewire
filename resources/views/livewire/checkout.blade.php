<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    @if ($showCheckoutButton)
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">Checkout</button>
        </form>
    @endif


    @if (!$showCheckoutButton)
        <button wire:click="proceedToCheckout(getCartItems())" id="proceed-to-checkout" type="button"
            class="button cart_button_checkout">Place An Order</button>
    @endif
    <livewire:countries-component />

    {{-- <button wire:click="proceedToCheckout(getCartItems())" id="proceed-to-checkout">Proceed to Checkout</button> --}}
</div>

<script>
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    function getCartItems() {
        const cartCookie = getCookie('cart');
        if (cartCookie) {
            try {
                return JSON.parse(cartCookie);
            } catch (e) {
                console.error('Failed to parse cart cookie', e);
                return [];
            }
        }
        return [];
    }
</script>
