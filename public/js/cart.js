document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('form.add-to-cart-form').forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();  // CANCEL the normal form submit

      const btn = form.querySelector('button[type="submit"]');
      btn.disabled = true;

      // Use FormData to grab the product_id
      const data = new FormData(form);

      axios.post(form.action, data)
        .then(response => {
          const count = response.data.count;

          // Update or create the badge
          let badge = document.querySelector('.cart-count');
          if (!badge) {
            const cartIcon = document.querySelector('.nav-icons a.icon-link');
            badge = document.createElement('span');
            badge.className = 'cart-count';
            cartIcon.appendChild(badge);
          }
          badge.textContent = count;
        })
        .catch(error => {
          console.error('Add to cart error', error);
        })
        .finally(() => {
          btn.disabled = false;
        });
    });
  });
});
