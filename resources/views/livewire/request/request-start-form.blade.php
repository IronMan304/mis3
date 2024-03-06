<div class="modal-content" id="request-start-form-modal-content">

    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($requestId)
           Start this request?
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
                {{--<div class="col-md-12" wire:ignore>
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
                </div>--}}

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

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Operators</label>
                        <select class="form-control select" id="operatorItems" wire:model="operatorItems" multiple @if ($option_id==2 || $request_status_id=! 10) disabled @endif> {{-- 6 means In Progress--}}
                            <option value="" selected>Assign Operators</option>
                            @foreach($operators as $operator)
                            <option value="{{ $operator->id ?? ''}}">
                                {{ $operator->first_name ?? '' }} {{ $operator->last_name ?? ''}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--<div class="col-md-6">
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
                </div>--}}

            


            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Start</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {

            // ToolItems Select2
            $('#operatorItems').select2({
                dropdownParent: $('#request-start-form-modal-content')
            });

            $('#operatorItems').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('operatorItems', data);
            });
        });

        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#operatorItems').select2({
                dropdownParent: $('#request-start-form-modal-content')
            });
        });

        
    </script>


</div>