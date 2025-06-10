document.addEventListener('DOMContentLoaded', () => {
  // Handle update forms
  document.querySelectorAll('.cart-update-form').forEach(form => {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const url   = form.action;
      const data  = new FormData(form);
      axios.post(url, data)
        .then(({data}) => {
          const container = form.closest('.cart-item');
          if (data.removed) {
            container.remove();
          } else {
            container.querySelector('.quantity-input').value = data.quantity;
            container.querySelector('.cart-item-subtotal').textContent = `$${data.itemSubtotal}`;
          }

          // Update summary totals
          document.querySelector('.summary-subtotal .summary-value').textContent = `$${data.cartSubtotal}`;
          document.querySelector('.summary-total .summary-value').textContent    = `$${data.cartTotal}`;

          // 🔄 Update navbar cart count
          updateCartCount(data.cartItemCount);
        });
    });
  });

  // Handle remove forms
  document.querySelectorAll('.cart-remove-form').forEach(form => {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const url = form.action;
      axios.delete(url)
        .then(({data}) => {
          form.closest('.cart-item').remove();

          // Update summary totals
          document.querySelector('.summary-subtotal .summary-value').textContent = `$${data.cartSubtotal}`;
          document.querySelector('.summary-total .summary-value').textContent    = `$${data.cartTotal}`;

          // 🔄 Update navbar cart count
          updateCartCount(data.cartItemCount);
        });
    });
  });

  // 🔄 Navbar cart count update helper
  function updateCartCount(count) {
  document.querySelectorAll('.cart-count').forEach(badge => {
    badge.textContent = count;
    badge.classList.add('cart-count-flash');
    setTimeout(() => badge.classList.remove('cart-count-flash'), 300);
  });
}

});
