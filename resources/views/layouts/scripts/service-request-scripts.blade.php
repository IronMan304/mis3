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

</script>
