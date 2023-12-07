<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeSexModal', () => {
        $('#sexModal').modal('hide');
    });
    window.livewire.on('openSexModal', () => {
        $('#sexModal').modal('show');
    });

</script>
