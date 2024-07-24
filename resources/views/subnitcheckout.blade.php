<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>

<body>
    <form id="checkout-form" action="{{ route('checkout') }}" method="POST">
        @csrf
        <button type="submit" style="display: none;">Checkout</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('checkout-form').submit();
        });
    </script>
</body>

</html>
