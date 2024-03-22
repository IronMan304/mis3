<script>
  document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.processed', (component) => {
      setTimeout(function() {
        $('#alert').fadeOut('fast');
      }, 5000);
    });
  });

  window.livewire.on('closeBorrowerModal', () => {
    $('#borrowerModal').modal('hide');
  });

  window.livewire.on('openBorrowerModal', () => {
    $('#borrowerModal').modal('show');
  });

  window.livewire.on('closeBorrowerAccountModal', () => {
    $('#borrowerAccountModal').modal('hide');
  });

  window.livewire.on('openBorrowerAccountModal', () => {
    $('#borrowerAccountModal').modal('show');
  });

  window.livewire.on('closeRequestModal', () => {
      $('#requestModal').modal('hide');
    });

    window.livewire.on('openRequestModal', () => {
      $('#requestModal').modal('show');
    });
</script>