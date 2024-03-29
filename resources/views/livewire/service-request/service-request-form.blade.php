<div class="modal-content" id="modal-content-srf">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($serviceRequestId)
            Edit Service Request
            @else
            Add Service Request
            @endif
        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    @if ($errors->any())
    <span class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </span>
    @endif
    @if(isset($errorMessage))
    <div class="alert alert-danger">
        {{ $errorMessage }}
    </div>
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">

                <div class="col-md-12" wire:ignore>
                    <div class="form-group local-forms">
                        <label>Requester
                        </label>
                        <select class="form-control select" id="borrower_id" wire:model="borrower_id">
                            <option value=null selected>Select a Requester</option>
                            @foreach ($borrowers as $borrower)
                            <option value="{{ $borrower->id }}">
                                {{$borrower->position->description}}: {{ $borrower->first_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Source
                        </label>
                        <select class="form-control select" wire:model="source_id">
                            <option value=null selected>Who is the owner of the equipment?</option>
                            @foreach ($sources as $source)

                            <option value="{{ $source->id }}">
                                {{ $source->description }}
                            </option>

                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-12" >
                    <div class="form-group local-forms">
                        <label>Equipment
                        </label>
                        <select class="form-control select"  wire:model="tool_id">
                            <option value=null selected>Select Equipment</option>
                            @foreach ($tools as $tool)
                            @if($source_id == 3)
                            <option value="{{ $tool->id }}" @if($tool->status_id != 1) disabled @endif>
                                {{ $tool->type->description }}: {{ $tool->property_number}} ({{$tool->status->description}})
                            </option>
                            @endif
                            @if($tool->source_id == 4 && $tool->owner_id == $borrower_id && $tool->owner_id != null)
                            <option value="{{ $tool->id }}" @if($tool->status_id != 1) disabled @endif>
                                {{ $tool->type->description }}: {{ $tool->property_number}} ({{$tool->status->description}})
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Service
                        </label>
                        <select class="form-control select" wire:model="service_id">
                            <option value=null selected>Select a Service</option>
                            @foreach ($services as $service)
                            <option value="{{ $service->id }}">
                                {{ $service->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
            <div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
    </form>
    <script>
        document.addEventListener('livewire:load', function() {
            window.livewire.hook('element.updated', () => {
                initSelect2();
            });
        });

        function initSelect2() {
            $('#borrower_id').select2({
                dropdownParent: $('#modal-content-srf')
            });

            $('#borrower_id').on('change', function(e) {
                let data = $(this).val();
                @this.set('borrower_id', data);
            });

            // Initialize Select2 for tool_id dropdown
            $('#tool_id').select2({
                dropdownParent: $('#modal-content-srf')
            });

            $('#tool_id').on('change', function(e) {
                let data = $(this).val();
                @this.set('tool_id', data);
            });
        }
        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#borrower_id, #tool_id').select2({
                dropdownParent: $('#modal-content-srf')
            });
        });
    </script>
</div>