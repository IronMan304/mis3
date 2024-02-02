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
                @if (auth()->user()->hasRole('admin'))
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
                @endif

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
                                ({{ $tool->brand }})
                            </option>
                            @elseif ($tool->status_id == 2 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) In Use
                            </option>
                            @elseif ($tool->status_id == 3 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) Lost
                            </option>
                            @elseif ($tool->status_id == 4 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) Damaged
                            </option>
                            @elseif ($tool->status_id == 5 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) In Repair
                            </option>
                            @elseif ($tool->status_id == 14 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) In Request
                            </option>
                            @elseif ($tool->status_id == 17 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) On Hold
                            </option>

                            @endif
                            @endforeach
                            @endif

                            @if($borrower_id && $borrowers->find($borrower_id)->position->description == 'Faculty')
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
                                ({{ $tool->brand }})
                            </option>
                            @elseif ($tool->status_id == 2 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) In Use
                            </option>
                            @elseif ($tool->status_id == 3 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) Lost
                            </option>
                            @elseif ($tool->status_id == 4 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) Damaged
                            </option>
                            @elseif ($tool->status_id == 5 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) In Repair
                            </option>
                            @elseif ($tool->status_id == 14 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) In Request
                            </option>
                            @elseif ($tool->status_id == 17 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) On Hold
                            </option>

                            @endif
                            @endforeach
                            @endif

                            @if($borrower_id && $borrowers->find($borrower_id)->position->description == 'Guest')
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
                                ({{ $tool->brand }})
                            </option>
                            @elseif ($tool->status_id == 2 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) In Use
                            </option>
                            @elseif ($tool->status_id == 3 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) Lost
                            </option>
                            @elseif ($tool->status_id == 4 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) Damaged
                            </option>
                            @elseif ($tool->status_id == 5 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) In Repair
                            </option>
                            @elseif ($tool->status_id == 14 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) In Request
                            </option>
                            @elseif ($tool->status_id == 17 && $matchingPosition)
                            <option value="{{ $tool->id }}" disabled>
                                ({{ $tool->brand }}) On Hold
                            </option>

                            @endif
                            @endforeach
                            @endif
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