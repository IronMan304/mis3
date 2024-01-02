<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });
    

    window.livewire.on('closeTrialModal', () => {
        $('#trialModal').modal('hide');
    });

    window.livewire.on('openTrialModal', () => {
        $('#trialModal').modal('show');
    });
</script>