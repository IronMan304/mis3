<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });

        window.livewire.on('closeRequestModal', () => {
      $('#requestModal').modal('hide');
    });

    window.livewire.on('openRequestModal', () => {
      $('#requestModal').modal('show');
    });

    window.livewire.on('closeReturnModal', () => {
      $('#returnModal').modal('hide');
    });

    window.livewire.on('openReturnModal', () => {
      $('#returnModal').modal('show');
    });

    window.livewire.on('closeRequestToolViewModal', () => {
      $('#requestToolViewModal').modal('hide');
    });

    window.livewire.on('openRequestToolViewModal', () => {
      $('#requestToolViewModal').modal('show');
    });

    window.livewire.on('closeApprovalModal', () => {
      $('#approvalModal').modal('hide');
    });

    window.livewire.on('openApprovalModal', () => {
      $('#approvalModal').modal('show');
    });


        $('#requestModal').on('shown.bs.modal', function() {
            if (!$.fn.DataTable.isDataTable('.datatable')) {
                table = $('.datatable').DataTable({
                    searching: false,
                    //order: [[1, 'desc']], 
                    //paging: false,
                });
            }
        });

        Livewire.hook('message.processed', (message, component) => {
            // Reinitialize DataTable after Livewire update
            
                $('.datatable').DataTable().destroy();
            

            $('.datatable').DataTable({
                searching: false
                // Add other DataTable options here if needed
            });
        });
    });
</script>