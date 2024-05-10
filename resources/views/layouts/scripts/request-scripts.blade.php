<script>
  document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('message.processed', (component) => {
      setTimeout(function() {
        $('#alert').fadeOut('fast');
      }, 5000);
    });

    window.livewire.on('closeRequestModal', () => {
      $('#requestModal').modal('hide');
    });

    window.livewire.on('openRequestModal', () => {
      $('#requestModal').modal('show');
    });

    window.livewire.on('closeCancelRequestModal', () => {
      $('#cancelRequestModal').modal('hide');
    });

    window.livewire.on('openCancelRequestModal', () => {
      $('#cancelRequestModal').modal('show');
    });

    window.livewire.on('closeReturnModal', () => {
      $('#returnModal').modal('hide');
    });

    window.livewire.on('openReturnModal', () => {
      $('#returnModal').modal('show');
    });

    window.livewire.on('closeRequestToolViewModal', () => {
      $('#requestToolViewModal').modal('hide');
    });

    window.livewire.on('openRequestToolViewModal', () => {
      $('#requestToolViewModal').modal('show');
    });

    window.livewire.on('closeApprovalModal', () => {
      $('#approvalModal').modal('hide');
    });

    window.livewire.on('openApprovalModal', () => {
      $('#approvalModal').modal('show');
    });

    window.livewire.on('closeSecurityApprovalModal', () => {
      $('#securityApprovalModal').modal('hide');
    });

    window.livewire.on('openSecurityApprovalModal', () => {
      $('#securityApprovalModal').modal('show');
    });

    window.livewire.on('closeRequestStartFormModal', () => {
      $('#requestStartFormModal').modal('hide');
    });

    window.livewire.on('openRequestStartFormModal', () => {
      $('#requestStartFormModal').modal('show');
    });


  });
</script>