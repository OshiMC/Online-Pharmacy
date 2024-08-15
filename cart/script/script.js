$(document).ready(function() {
    // Update cart total
    function updateCartTotal() {
      var total = 0;
      $('.cart-items .item').each(function() {
        var price = parseFloat($(this).find('.item-price').text());
        var quantity = parseInt($(this).find('.item-quantity').val());
        total += price * quantity;
      });
      $('#cart-total').text(total.toFixed(2));
    }
  
    // Add item to cart
    $('.add-to-cart-form').submit(function(e) {
      e.preventDefault();
      var form = $(this);
      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        success: function(response) {
          // Handle success
          // Update the cart UI
          $('.cart-items').append(response);
          updateCartTotal();
        },
        error: function() {
          // Handle error
        }
      });
    });
  
    // Update item quantity in cart
    $('.cart-items').on('change', '.item-quantity', function() {
      var form = $(this).closest('form');
      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        success: function(response) {
          // Handle success
          // Update the cart UI
          updateCartTotal();
        },
        error: function() {
          // Handle error
        }
      });
    });
  
    // Remove item from cart
    $('.cart-items').on('click', '.remove-item', function(e) {
      e.preventDefault();
      var form = $(this).closest('form');
      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        success: function(response) {
          // Handle success
          // Remove the item from the cart UI
          form.closest('.item').remove();
          updateCartTotal();
        },
        error: function() {
          // Handle error
        }
      });
    });
  
    // Checkout button
    $('.checkout-btn').click(function() {
      // Implement your checkout logic here
    });
  });
  