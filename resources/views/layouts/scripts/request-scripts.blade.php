<script>
  document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.processed', (component) => {
      setTimeout(function() {
        $('#alert').fadeOut('fast');
      }, 5000);
    });
  });

  window.livewire.on('closeRequestModal', () => {
    $('#requestModal').modal('hide');
  });

  window.livewire.on('openRequestModal', () => {
    $('#requestModal').modal('show');
  });
</script>