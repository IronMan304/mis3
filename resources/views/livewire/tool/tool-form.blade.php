<div class="modal-content">
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

                <div class="col-md-12">
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

                <div class="col-md-12">
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


                <div class="col-md-12">
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

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Brand
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="brand" placeholder="A4Tech" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Property Number
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="property_number" placeholder="ABC123456789XYZ" />
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>