document.addEventListener('DOMContentLoaded', function() {
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
      form.addEventListener('submit', function(e) {
          const price = form.querySelector('[name="roomPrice"]');
          if (price && parseFloat(price.value) <= 0) {
              e.preventDefault();
              alert('Price must be greater than 0');
          }
      });
  });
});