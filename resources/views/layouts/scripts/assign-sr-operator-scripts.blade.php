<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeAssignSROperatorModal', () => {
        $('#assignSROperatorModal').modal('hide');
    });
    window.livewire.on('openAssignSROperatorModal', () => {
        $('#assignSROperatorModal').modal('show');
    });

</script>
