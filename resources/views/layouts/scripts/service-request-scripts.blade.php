<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeServiceRequestModal', () => {
        $('#serviceRequestModal').modal('hide');
    });
    window.livewire.on('openServiceRequestModal', () => {
        $('#serviceRequestModal').modal('show');
    });
    window.livewire.on('closeAssignSROperatorModal', () => {
        $('#assignSROperatorModal').modal('hide');
    });
    window.livewire.on('openAssignSROperatorModal', () => {
        $('#assignSROperatorModal').modal('show');
    });
    window.livewire.on('closeServiceRequestStartModal', () => {
      $('#serviceRequestStartModal').modal('hide');
    });

    window.livewire.on('openServiceRequestStartModal', () => {
      $('#serviceRequestStartModal').modal('show');
    });
    window.livewire.on('closeSReturnModal', () => {
      $('#sreturnModal').modal('hide');
    });

    window.livewire.on('openSReturnModal', () => {
      $('#sreturnModal').modal('show');
    });

</script>
