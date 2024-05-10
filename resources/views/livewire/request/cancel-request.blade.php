<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($requestId)
            Cancel Request
            @else
            Add Sex
            @endif
        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    @if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

    @if(isset($errorMessage))
    <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="text-dark">

            <div class="alert alert-danger">
                {{ $errorMessage }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Request Cancellation Reason
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="cancel_reason" placeholder />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
    </form>
</div>