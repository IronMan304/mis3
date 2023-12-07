<script>
  document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.processed', (component) => {
      setTimeout(function() {
        $('#alert').fadeOut('fast');
      }, 5000);
    });
  });

  window.livewire.on('closeTypeModal', () => {
    $('#typeModal').modal('hide');
  });

  window.livewire.on('openTypeModal', () => {
    $('#typeModal').modal('show');
  });
</script>