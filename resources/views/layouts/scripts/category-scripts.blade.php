<script>
  document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.processed', (component) => {
      setTimeout(function() {
        $('#alert').fadeOut('fast');
      }, 5000);
    });
  });

  window.livewire.on('closeCategoryModal', () => {
    $('#categoryModal').modal('hide');
  });

  window.livewire.on('openCategoryModal', () => {
    $('#categoryModal').modal('show');
  });
</script>