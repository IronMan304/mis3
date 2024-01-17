<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeServiceModal', () => {
        $('#serviceModal').modal('hide');
    });
    window.livewire.on('openServiceModal', () => {
        $('#serviceModal').modal('show');
    });

</script>
