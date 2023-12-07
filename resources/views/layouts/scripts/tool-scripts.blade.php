<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeToolModal', () => {
        $('#toolModal').modal('hide');
    });

    window.livewire.on('openToolModal', () => {
        $('#toolModal').modal('show');
    });
</script>