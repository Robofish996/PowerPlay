// Toggle the sidebar menu
const hamburgerMenu = document.getElementById('hamburger-menu');
const sidebar = document.getElementById('sidebar');
const body = document.body;

hamburgerMenu.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});
$(document).ready(function() {
    // Attach a click event handler to category tabs/buttons
    $('.category-tab').click(function() {
        // Get the selected category
        var selectedCategory = $(this).data('category');

        // Send an AJAX request to retrieve products for the selected category
        $.ajax({
            url: 'get_products_by_category.php', // Replace with the actual URL for fetching products
            method: 'POST',
            data: { category: selectedCategory },
            success: function(response) {
                // Update the "category-products" div with the fetched products
                $('.category-products').html(response);
            },
            error: function(error) {
                console.error('Error fetching products: ' + error);
            }
        });
    });
});
