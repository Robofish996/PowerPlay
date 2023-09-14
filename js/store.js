// Toggle the sidebar menu
const hamburgerMenu = document.getElementById('hamburger-menu');
const sidebar = document.getElementById('sidebar');
const body = document.body;

hamburgerMenu.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});
// Initialize an empty cart object
let cart = [];

// Function to add a product to the cart
function addToCart(product) {
    cart.push(product);
    updateCartDisplay();
}

// Function to update the cart display
function updateCartDisplay() {
    // You can update the cart display as per your design
    // For example, you can display the number of items in the cart
    const cartCount = document.getElementById('cart-count');
    cartCount.textContent = cart.length;
}

// Function to redirect to the cart page
function redirectToCart() {
    // Serialize the cart data to JSON and encode it
    const cartData = encodeURIComponent(JSON.stringify(cart));
    
    // Redirect to cart.php with cart data as a query parameter
    window.location.href = `cart.php?cart=${cartData}`;
}

document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to all "Add to Cart" buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart-button');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Extract product information from the button or any other source
            const productId = button.getAttribute('data-product-id');
            const productName = "Product Name"; // Replace with actual product name
            const productPrice = 10.99; // Replace with actual product price

            // Create a product object
            const product = {
                id: productId,
                name: productName,
                price: productPrice,
            };

            // Add the product to the cart
            addToCart(product);

            // After adding products to the cart, redirect to the cart page
            redirectToCart();
        });
    });
});
