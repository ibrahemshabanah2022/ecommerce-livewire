function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(";").shift();
}

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function updateCartCount() {
    const cartCookie = getCookie("cart");
    let productCount = 0;

    if (cartCookie) {
        try {
            const cartItems = JSON.parse(cartCookie);
            productCount = Array.isArray(cartItems) ? cartItems.length : 0;
        } catch (e) {
            console.error("Failed to parse cart cookie", e);
        }
    }

    document.getElementById("cart-count").textContent = productCount;
}

function isProductInCart(productId) {
    const cartCookie = getCookie("cart");
    if (cartCookie) {
        try {
            const cartItems = JSON.parse(cartCookie);
            return cartItems.some((item) => item.id === productId);
        } catch (e) {
            console.error("Failed to parse cart cookie", e);
        }
    }
    return false;
}

function addToCart(product, button) {
    const cartCookie = getCookie("cart");
    let cartItems = [];

    if (cartCookie) {
        try {
            cartItems = JSON.parse(cartCookie);
            if (!Array.isArray(cartItems)) {
                cartItems = [];
            }
        } catch (e) {
            console.error("Failed to parse cart cookie", e);
        }
    }

    // Check if the product is already in the cart
    const productExists = cartItems.some((item) => item.id === product.id);

    if (!productExists) {
        // Add the new product to the cart
        cartItems.push(product);
        setCookie("cart", JSON.stringify(cartItems), 7); // Cookie will expire in 7 days

        // Update the cart count
        updateCartCount();

        // Change button text and disable it
        // button.textContent = "Added to cart";
        button.disabled = true;
    }
}

function decreaseCartCount() {
    const cartCountElement = document.getElementById("cart-count");
    let currentCount = parseInt(cartCountElement.textContent, 10);

    if (currentCount > 0) {
        currentCount--;
        cartCountElement.textContent = currentCount;
    }
}

document.addEventListener("DOMContentLoaded", function () {
    updateCartCount();

    // Add event listener to "Add to Cart" buttons
    document.querySelectorAll(".add-to-cart").forEach((button) => {
        const productId = parseInt(button.getAttribute("data-product-id"), 10);
        if (isProductInCart(productId)) {
            button.textContent = "Added to cart";
            button.disabled = true; // Optional: disable the button to prevent further clicks
        } else {
            button.removeEventListener("click", handleAddToCart);
            button.addEventListener("click", handleAddToCart);
        }
    });

    // Add event listener to "Decrease Cart Count" buttons
    document.querySelectorAll(".decrease-cart-count").forEach((button) => {
        button.removeEventListener("click", handleDecreaseCartCount);
        button.addEventListener("click", handleDecreaseCartCount);
    });
});

function handleAddToCart(event) {
    const productId = this.getAttribute("data-product-id");
    const product = { id: productId, quantity: 1 }; // Add more product details as needed
    addToCart(product, this);
}

function handleDecreaseCartCount(event) {
    decreaseCartCount();
}
