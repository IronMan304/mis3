<div class="modal-content" id="approval-modal-content">

    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($approvalId)
            Request response
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
                        <select class="form-control select" id="requester_id" wire:model="borrower_id" disabled>
                            <option value="" selected>Select a Borrower</option>
                            @foreach ($borrowers as $borrower)
                            <option value="{{ $borrower->id }}">
                                ({{$borrower->first_name}}) {{ $borrower->last_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Operator
                        </label>
                        <select class="form-control select" wire:model="option_id" disabled>
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
                        <input class="form-control" type="date" wire:model="estimated_return_date" placeholder="mm/dd/yyyy" disabled />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Purpose
                        </label>
                        <input class="form-control" type="text" wire:model="purpose" placeholder disabled />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Response</label>
                        <select class="form-control select" wire:model="selectedConditionStatus"{{--@if ($approval_toolItems == null) disabled @endif--}}>
                            <option value="" selected>Condition of the tool</option>
                            @foreach ($statuses as $status)
                            @if($status->id == 10 || $status->id == 15 )
                            @if($status->id == 10)
                            <option value="{{ $status->id }}">Approve</option>
                            @else
                            <option value="{{ $status->id }}">Reject</option>
                            @endif
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>


                {{--<h1>Return ID: {{ $approvalId }}</h1>--}}

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Tools</label>
                        <select class="form-control select" id="approval_toolItems" wire:model="approval_toolItems"  multiple @if ($selectedConditionStatus == 15) disabled @endif >
                            <option value="" selected>Select Tools</option>
                            @foreach($tool_requests as $tool_request)
                            @if($tool_request->request_id == $approvalId && $tool_request->status_id == 14) {{-- In Request --}}

                            <option value="{{ $tool_request->tools->id }}">
                                {{ $tool_request->tools->brand }}
                            </option>
                            @endif
                            @endforeach
                        </select>

                    </div>
                </div>

                <!-- {{--
                    <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Operators</label>
                        <select class="form-control select" id="operatorItems" wire:model="operatorItems" multiple @if ($option_id==2 || $request_status_id=! 6) disabled @endif> {{-- 6 means In Progress--}}
                            <option value="" selected>Assign Operators</option>
                            @foreach($operators as $operator)
                            <option value="{{ $operator->id ?? ''}}">
                                {{ $operator->first_name ?? '' }} {{ $operator->last_name ?? ''}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>--}} -->

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Description
                        </label>
                        <input class="form-control" type="text" wire:model="description" placeholder {{--@if ($approval_toolItems != null) disabled @endif --}}/>
                    </div>
                </div>

                {{--@foreach($tool_requests as $tool_request)
                @if($tool_request->request_id == $approvalId)
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
            $('#requester_id').select2({
                dropdownParent: $('#approval-modal-content')
            });

            $('#requester_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('requester_id', data);
            });

            // ToolItems Select2
            $('#approval_toolItems').select2({
                dropdownParent: $('#approval-modal-content')
            });

            $('#approval_toolItems').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('approval_toolItems', data);
            });

            // ToolItems Select2
            $('#operatorItems').select2({
                dropdownParent: $('#approval-modal-content')
            });

            $('#operatorItems').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('operatorItems', data);
            });
        });

        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#requester_id, #approval_toolItems, #operatorItems').select2({
                dropdownParent: $('#approval-modal-content')
            });
        });
    </script>


</div>