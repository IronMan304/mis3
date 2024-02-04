<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeOptionModal', () => {
        $('#optionModal').modal('hide');
    });
    window.livewire.on('openOptionModal', () => {
        $('#optionModal').modal('show');
    });

</script>
