<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($requestId)
            Edit Sex
            @else
            Add Sex
            @endif
        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    @if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Borrower
                        </label>
                        <input class="form-control" type="text" wire:model="borrower_id" placeholder disabled />
                    </div>
                </div>
                <div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
    </form>
</div>