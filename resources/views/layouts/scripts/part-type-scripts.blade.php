<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closePartTypeModal', () => {
        $('#partTypeModal').modal('hide');
    });
    window.livewire.on('openPartTypeModal', () => {
        $('#partTypeModal').modal('show');
    });

</script>
