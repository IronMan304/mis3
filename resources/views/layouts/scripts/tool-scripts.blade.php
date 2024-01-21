<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });

        window.livewire.on('closeToolModal', () => {
            $('#toolModal').modal('hide');
        });

        window.livewire.on('openToolModal', () => {
            $('#toolModal').modal('show');
        });

        $('#toolModal').on('shown.bs.modal', function() {
            if (!$.fn.DataTable.isDataTable('.datatable')) {
                table = $('.datatable').DataTable({
                    searching: false,
                    // order: [[0, 'asc']], 
                });
            }
        });

        Livewire.hook('message.processed', (message, component) => {
            // Reinitialize DataTable after Livewire update
            if ($.fn.DataTable.isDataTable('.datatable')) {
                $('.datatable').DataTable().destroy();
            }

            $('.datatable').DataTable({
                searching: false
                // Add other DataTable options here if needed
            });
        });
    });
</script>