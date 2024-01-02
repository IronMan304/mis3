<div class="modal-content" id="modal-content">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <div class="modal-header">

        <h1 class="modal-title fs-5">

        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    @if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">

                <div class="col-md-12" wire:ignore>
                    <select id="description" class="form-control select">
                        <option value="Apple">Apple</option>
                        <option value="Samsung">Samsung</option>
                        <option value="HTC">HTC</option>
                        <option value="One Plus">One Plus</option>
                        <option value="Nokia">Nokia</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
document.addEventListener('livewire:load', function () {
    $('#description').select2({
        dropdownParent: $('#modal-content')
    });

    $('#description').on('change', function (e) {
        let data = $(this).val();
        console.log(data);
        @this.set('description', data);
    });
});

document.addEventListener('livewire:update', function () {
    $('#description').select2({
        dropdownParent: $('#modal-content')
    });
});
</script>


</div>