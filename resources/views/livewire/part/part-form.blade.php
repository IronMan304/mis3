<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($partId)
            Edit Parts
            @else
            Add Parts
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
                            Part Name
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="name" placeholder />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Part Brand
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="brand" placeholder />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Part Property Number
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="property_number" placeholder />
                    </div>
                </div>

                {{--<div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Price
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="price" placeholder />
                    </div>
                </div>--}}

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Tool
                            <!-- <span class="login-danger">*</span> -->
                        </label>
                        <select class="form-control select" wire:model="tool_id" id="tool_id">
                            <option value="" selected>Select a Tool</option>
                            @foreach ($tools as $tool)
                            <option value="{{ $tool->id }}">
                                {{$tool->type->description ?? ''}} - {{ $tool->brand ?? ''}} - {{ $tool->property_number ?? ''}}
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

            // positionItems Select2
            $('#tool_id').select2({
                dropdownParent: $('#partModal')
            });

            $('#tool_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('tool_id', data);
            });
        });

        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#tool_id').select2({
                dropdownParent: $('#partModal')
            });
        });
    </script>
</div>