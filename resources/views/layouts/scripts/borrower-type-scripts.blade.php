<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeBorrowerTypeModal', () => {
        $('#borrowerTypeModal').modal('hide');
    });
    window.livewire.on('openBorrowerTypeModal', () => {
        $('#borrowerTypeModal').modal('show');
    });

</script>
