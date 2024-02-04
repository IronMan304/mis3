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
                @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('staff'))
                <div class="col-md-12" wire:ignore>
                    <div class="form-group local-forms">
                        <label>Borrower
                        </label>
                        <select class="form-control select" id="borrower_id" wire:model="borrower_id">
                            <option value="" selected>Select a Borrower</option>
                            @foreach ($borrowers as $borrower)
                            <option value="{{ $borrower->id }}">
                                {{$borrower->first_name}} {{ $borrower->last_name }} ({{ $borrower->position->description ?? ''}})
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Tool</label>
                        <select class="form-control select" id="toolItems" multiple wire:model="toolItems">
                            <option value="" selected>Select a Tool</option>s

                            @if($borrower_id && $borrowers->find($borrower_id)->position_id == 1)
                            @foreach ($tools as $tool)
                            @php
                            $matchingPosition = false;
                            foreach ($tool->position_keys as $positionKey) {
                            if ($positionKey->position_id == 1) {
                            $matchingPosition = true;
                            break;
                            }
                            }
                            @endphp
                            @if ($tool->status_id == 1 && $matchingPosition)
                            <option value="{{ $tool->id }}">
                                {{ $tool->brand }} ( {{ $tool->property_number }})
                            </option>
                            @elseif ($tool->status_id == 2 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Use
                            </option>
                            @elseif ($tool->status_id == 3 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Lost
                            </option>
                            @elseif ($tool->status_id == 4 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Damaged
                            </option>
                            @elseif ($tool->status_id == 5 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Repair
                            </option>
                            @elseif ($tool->status_id == 14 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Request
                            </option>
                            @elseif ($tool->status_id == 17 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) On Hold
                            </option>

                            @endif
                            @endforeach
                            {{--@endif--}}

                            @elseif($borrower_id && $borrowers->find($borrower_id)->position->description == 'Faculty')
                            @foreach ($tools as $tool)
                            @php
                            $matchingPosition = false;
                            foreach ($tool->position_keys as $positionKey) {
                            if ($positionKey->position_id == 2) {
                            $matchingPosition = true;
                            break;
                            }
                            }
                            @endphp
                            @if ($tool->status_id == 1 && $matchingPosition)
                            <option value="{{ $tool->id }}">
                                {{ $tool->brand }} ( {{ $tool->property_number }})
                            </option>
                            @elseif ($tool->status_id == 2 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Use
                            </option>
                            @elseif ($tool->status_id == 3 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Lost
                            </option>
                            @elseif ($tool->status_id == 4 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Damaged
                            </option>
                            @elseif ($tool->status_id == 5 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Repair
                            </option>
                            @elseif ($tool->status_id == 14 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Request
                            </option>
                            @elseif ($tool->status_id == 17 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) On Hold
                            </option>

                            @endif
                            @endforeach
                            {{--@endif--}}


                            @elseif($borrower_id && $borrowers->find($borrower_id)->position_id == 8)
                            @foreach ($tools as $tool)
                            @php
                            $matchingPosition = false;
                            foreach ($tool->position_keys as $positionKey) {
                            if ($positionKey->position_id == 8) {
                            $matchingPosition = true;
                            break;
                            }
                            }
                            @endphp
                            @if ($tool->status_id == 1 && $matchingPosition)
                            <option value="{{ $tool->id }}">
                                {{ $tool->brand }} ( {{ $tool->property_number }})
                            </option>
                            @elseif ($tool->status_id == 2 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Use
                            </option>
                            @elseif ($tool->status_id == 3 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Lost
                            </option>
                            @elseif ($tool->status_id == 4 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Damaged
                            </option>
                            @elseif ($tool->status_id == 5 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Repair
                            </option>
                            @elseif ($tool->status_id == 14 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Request
                            </option>
                            @elseif ($tool->status_id == 17 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) On Hold
                            </option>

                            @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                @endif


                @if (auth()->user()->hasRole('requester'))

                <div class="col-md-12" wire:ignore>
                    <div class="form-group local-forms">
                        <label>Borrower
                        </label>
                        <select class="form-control select" disabled>


                            <option value="{{ $borrower_id }}">
                                {{$first_name}}
                            </option>

                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Tool</label>
                        <select class="form-control select" id="toolItems" multiple wire:model="toolItems">
                            <option value="" selected>Select a Tool</option>s

                            @if(auth()->user()->position_id == 1)
                            @foreach ($tools as $tool)
                            @php
                            $matchingPosition = false;
                            foreach ($tool->position_keys as $positionKey) {
                            if ($positionKey->position_id == auth()->user()->position_id) {
                            $matchingPosition = true;
                            break;
                            }
                            }
                            @endphp
                            @if ($tool->status_id == 1 && $matchingPosition)
                            <option value="{{ $tool->id }}">
                                {{ $tool->brand }} ( {{ $tool->property_number }})
                            </option>
                            @elseif ($tool->status_id == 2 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Use
                            </option>
                            @elseif ($tool->status_id == 3 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Lost
                            </option>
                            @elseif ($tool->status_id == 4 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Damaged
                            </option>
                            @elseif ($tool->status_id == 5 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Repair
                            </option>
                            @elseif ($tool->status_id == 14 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Request
                            </option>
                            @elseif ($tool->status_id == 17 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) On Hold
                            </option>

                            @endif
                            @endforeach
                            @endif

                            @if(auth()->user()->position_id == 2)
                            @foreach ($tools as $tool)
                            @php
                            $matchingPosition = false;
                            foreach ($tool->position_keys as $positionKey) {
                            if ($positionKey->position_id == auth()->user()->position_id) {
                            $matchingPosition = true;
                            break;
                            }
                            }
                            @endphp
                            @if ($tool->status_id == 1 && $matchingPosition)
                            <option value="{{ $tool->id }}">
                                {{ $tool->brand }} ( {{ $tool->property_number }})
                            </option>
                            @elseif ($tool->status_id == 2 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Use
                            </option>
                            @elseif ($tool->status_id == 3 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Lost
                            </option>
                            @elseif ($tool->status_id == 4 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Damaged
                            </option>
                            @elseif ($tool->status_id == 5 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Repair
                            </option>
                            @elseif ($tool->status_id == 14 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Request
                            </option>
                            @elseif ($tool->status_id == 17 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) On Hold
                            </option>

                            @endif
                            @endforeach
                            @endif

                            @if(auth()->user()->position_id == 8)
                            @foreach ($tools as $tool)
                            @php
                            $matchingPosition = false;
                            foreach ($tool->position_keys as $positionKey) {
                            if ($positionKey->position_id == auth()->user()->position_id) {
                            $matchingPosition = true;
                            break;
                            }
                            }
                            @endphp
                            @if ($tool->status_id == 1 && $matchingPosition)
                            <option value="{{ $tool->id }}">
                                {{ $tool->brand }} ( {{ $tool->property_number }})
                            </option>
                            @elseif ($tool->status_id == 2 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Use
                            </option>
                            @elseif ($tool->status_id == 3 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Lost
                            </option>
                            @elseif ($tool->status_id == 4 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) Damaged
                            </option>
                            @elseif ($tool->status_id == 5 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Repair
                            </option>
                            @elseif ($tool->status_id == 14 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) In Request
                            </option>
                            @elseif ($tool->status_id == 17 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                {{ $tool->brand }} ( {{ $tool->property_number }}) On Hold
                            </option>

                            @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                @endif

                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Operator
                        </label>
                        <select class="form-control select" wire:model="option_id">
                            <option value="" selected>Do you need an operator?</option>
                            @foreach ($options as $option)
                            <option value="{{ $option->id }}">
                                {{ $option->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Estimated Return Date</label>
                        <input class="form-control" type="date" wire:model="estimated_return_date" placeholder="mm/dd/yyyy" />
                    </div>
                </div>

                <div class="col-md-12">
					<div class="form-group local-forms">
						<label>
							Purpose
						</label>
						<input class="form-control" type="text" wire:model="purpose" placeholder />
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

            // ToolItemsFaculty Select2
            $('#toolItemsFaculty').select2({
                dropdownParent: $('#modal-content')
            });

            $('#toolItemsFaculty').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('toolItemsFaculty', data);
            });
        });


        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#borrower_id, #toolItems, #toolItemsFaculty').select2({
                dropdownParent: $('#modal-content')
            });
        });
    </script>

</div>