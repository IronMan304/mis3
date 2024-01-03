<div class="modal-content" id="modal-content">
    
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($requestId)
            Edit Request
            @else
            Add Request
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
                <div class="col-md-12" wire:ignore>
                    <div class="form-group local-forms">
                        <label>Borrower
                         
                        </label>
                        <select class="form-control select" id="borrower_id" wire:model="borrower_id">
                            <option value=""  selected>Select a Borrower</option>
                            @foreach ($borrowers as $borrower)
                            <option value="{{ $borrower->id }}">
                                ({{$borrower->first_name}}) {{ $borrower->last_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12" wire:ignore>
                    <div>
                        <label>Tool
                           
                        </label>
                        <select class="form-control select" id="toolItems" multiple wire:model="toolItems">
                            <option value="" selected >Select a Tool</option>
                            @foreach ($tools as $tool)
                            <option value="{{ $tool->id }}">
                                ({{$tool->brand}}) 
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>


               


            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
  
    <script>
    document.addEventListener('livewire:load', function() {
        // Borrower Select2
        $('#borrower_id').select2({
            dropdownParent: $('#modal-content')
        });

        $('#borrower_id').on('change', function(e) {
            let data = $(this).val();
            console.log(data);
            @this.set('borrower_id', data);
        });

        // ToolItems Select2
        $('#toolItems').select2({
            dropdownParent: $('#modal-content')
        });

        $('#toolItems').on('change', function(e) {
            let data = $(this).val();
            console.log(data);
            @this.set('toolItems', data);
        });
    });

    document.addEventListener('livewire:update', function() {
        // Refresh Select2 on Livewire update
        $('#borrower_id, #toolItems').select2({
            dropdownParent: $('#modal-content')
        });
    });
</script>


</div>