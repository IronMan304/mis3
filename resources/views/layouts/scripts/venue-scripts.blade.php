<script>
  document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.processed', (component) => {
      setTimeout(function() {
        $('#alert').fadeOut('fast');
      }, 5000);
    });
  });

  window.livewire.on('closeVenueModal', () => {
    $('#venueModal').modal('hide');
  });

  window.livewire.on('openVenueModal', () => {
    $('#venueModal').modal('show');
  });
</script>