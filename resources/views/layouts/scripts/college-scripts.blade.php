<script>
  document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.processed', (component) => {
      setTimeout(function() {
        $('#alert').fadeOut('fast');
      }, 5000);
    });
  });

  window.livewire.on('closeCollegeModal', () => {
    $('#collegeModal').modal('hide');
  });

  window.livewire.on('openCollegeModal', () => {
    $('#collegeModal').modal('show');
  });
</script>