<div class="modal-content" id="toolModal">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($toolId)
            Edit Tool
            @else
            Add Tool
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

                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Category
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select" wire:model="category_id">
                            <option value=""  selected>Select a Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                ({{$category->code}}) {{ $category->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Type
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select" wire:model="type_id">
                            <option value=""  selected>Select a Type</option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}">
                                ({{ $type->code }}) {{ $type->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Source
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select" wire:model="source_id">
                            <option value=""  selected>Select a Source</option>
                            @foreach ($sources as $source)
                            <option value="{{ $source->id }}">
                                ({{$source->code}}) {{ $source->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>
                            Brand
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="brand" placeholder="A4Tech" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>
                            Property Number
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="property_number" placeholder="ABC123456789XYZ" />
                    </div>
                </div>
       
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Applicability
                        </label>
                        <select class="form-control select" wire:model="positionItems" multiple id="positionItems">
                            <option value=""  selected>Assign who can borrow</option>
                            @foreach ($positions as $position)
                            <option value="{{ $position->id }}">
                                {{ $position->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Security
                        </label>
                        <select class="form-control select" wire:model="securityItems" multiple id="securityItems">
                            <option value=""  selected>Assign who will need to sign</option>
                            @foreach ($securities as $security)
                            <option value="{{ $security->id }}">
                                {{ $security->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--<div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Applicability
                        </label>
                        <select class="form-control select" wire:model="position_id">
                            <option value=""  selected>Select who can borrow</option>
                       
                            @foreach ($positions as $position)
                            @if ($position->id != 3)
                            <option value="{{ $position->id }}">
                                {{$position->description}}
                            </option>
                            @endif
                            @endforeach
                      
                        </select>
                    </div>
                </div>--}}

            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {

            // positionItems Select2
            $('#positionItems').select2({
                dropdownParent: $('#toolModal')
            });

            $('#positionItems').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('positionItems', data);
            });

              // securityItems Select2
              $('#securityItems').select2({
                dropdownParent: $('#toolModal')
            });

            $('#securityItems').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('securityItems', data);
            });
        });

        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#positionItems, #securityItems').select2({
                dropdownParent: $('#toolModal')
            });
        });
    </script>
</div>