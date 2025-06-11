document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('form.add-to-cart-form').forEach(form => {
    form.addEventListener('submit', function (e) {
      e.preventDefault(); // Stop the normal form submission

      const btn = form.querySelector('button[type="submit"]');
      btn.disabled = true;

      const data = new FormData(form);

      axios.post(form.action, data)
        .then(response => {
          const count = response.data.count;

          // Find the existing badge or create a new one
          let badge = document.querySelector('.cart-count');
          if (!badge) {
            const cartIcon = document.querySelector('.nav-icons a.icon-link');

            if (cartIcon) {
              badge = document.createElement('span');
              badge.className = 'cart-count';
              cartIcon.appendChild(badge);
            }
          }

          if (badge) {
            badge.textContent = count;
            badge.classList.add('cart-count-flash');
            setTimeout(() => badge.classList.remove('cart-count-flash'), 300);
          }

          console.log(`🛒 Cart updated. New count: ${count}`);
        })
        .catch(error => {
          console.error('❌ Add to cart error:', error);
        })
        .finally(() => {
          // ✅ Re-enable the button even if the request fails
          btn.disabled = false;
          console.log('🔁 Re-enabled add-to-cart button');
        });
    });
  });
});