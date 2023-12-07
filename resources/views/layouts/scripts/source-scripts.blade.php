<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeSourceModal', () => {
        $('#sourceModal').modal('hide');
    });

    window.livewire.on('openSourceModal', () => {
        $('#sourceModal').modal('show');
    });
</script>