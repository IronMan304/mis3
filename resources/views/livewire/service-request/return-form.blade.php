<div class="modal-content" id="return-modal-content">

    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($returnId)
            Return / Report Tool
            @else
            Add Request
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
                        <label>Borrower

                        </label>
                        <select class="form-control select" id="returner_id" wire:model="borrower_id" disabled>
                            <option value="" selected>Select a Borrower</option>
                            @foreach ($borrowers as $borrower)
                            <option value="{{ $borrower->id }}">
                                ({{$borrower->first_name}}) {{ $borrower->last_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Condition</label>
                        <select class="form-control select" wire:model="selectedConditionStatus">
                            <option value="" selected>Condition of the tool</option>
                            @foreach ($statuses as $status)
                            @if($status->id == 1 || $status->id == 4)
                            @if($status->id == 1)
                            <option value="{{ $status->id }}">Good</option>
                            @else
                            <option value="{{ $status->id }}">{{ $status->description }}</option>
                            @endif
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>


                {{--<h1>Return ID: {{ $returnId }}</h1>--}}

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Tools</label>
                        <select class="form-control select" wire:model="tool_id"  disabled>
                            <option value="" selected>Select Tools</option>
                            @foreach($service_requests as $tool_request)
                            <option value="{{ $tool_request->tool_id }}">
                                {{ $tool_request->tool->property_number ?? ''}}
                            </option>
                        
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="col-md-12">
					<div class="form-group local-forms">
						<label>
							Description
						</label>
                        <textarea class="form-control" wire:model="description" placeholder="Enter description..." rows="5"></textarea>
					</div>
				</div>

                {{--@foreach($tool_requests as $tool_request)
                @if($tool_request->request_id == $returnId)
                <p>
                    {{ $tool_request->tools->brand }}
                </p>
                @endif
                @endforeach--}}


            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            // Borrower Select2
            $('#returner_id').select2({
                dropdownParent: $('#return-modal-content')
            });

            $('#returner_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('returner_id', data);
            });

            // ToolItems Select2
            $('#return_toolItems').select2({
                dropdownParent: $('#return-modal-content')
            });

            $('#return_toolItems').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('return_toolItems', data);
            });
        });

        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#returner_id, #return_toolItems').select2({
                dropdownParent: $('#return-modal-content')
            });
        });
    </script>


</div>