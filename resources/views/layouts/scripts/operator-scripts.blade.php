<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeOperatorModal', () => {
        $('#operatorModal').modal('hide');
    });
    window.livewire.on('openOperatorModal', () => {
        $('#operatorModal').modal('show');
    });
    window.livewire.on('closeOperatorAccountModal', () => {
        $('#operatorAccountModal').modal('hide');
    });
    window.livewire.on('openOperatorAccountModal', () => {
        $('#operatorAccountModal').modal('show');
    });

</script>
