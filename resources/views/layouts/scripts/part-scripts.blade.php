<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closePartModal', () => {
        $('#partModal').modal('hide');
    });
    window.livewire.on('openPartModal', () => {
        $('#partModal').modal('show');
    });

</script>
