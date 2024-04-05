<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeSecurityModal', () => {
        $('#securityModal').modal('hide');
    });
    window.livewire.on('openSecurityModal', () => {
        $('#securityModal').modal('show');
    });

</script>
