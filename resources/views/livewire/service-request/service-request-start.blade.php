<div class="modal-content" id="service-request-start-form-modal-content">

    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($serviceRequestId)
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

                @if (auth()->user()->hasRole('admin'))
                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Operator
                        </label>
                        <select class="form-control select" id="operator_id" wire:model="operator_id" >
                            <option value="" selected>Choose an operator</option>
                            @foreach ($operators as $operator)
                            <option value="{{ $operator->id }}">
                                {{ $operator->first_name ?? ''}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @elseif (auth()->user()->hasRole('operator'))
                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Operator
                        </label>
                        <select class="form-control select" id="operator_id" wire:model="operator_id" disabled>
                            <option value="" selected>Choose an operator</option>
                            @foreach ($operators as $operator)
                            <option value="{{ $operator->id }}">
                                {{ $operator->first_name ?? ''}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif

                 {{--<div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Operators</label>
                        <select class="form-control select" id="operatorItems" wire:model="operatorItems" multiple @if ($option_id==2 || $request_status_id=! 10) disabled @endif> 
                            <option value="" selected>Assign Operators</option>
                            @foreach($operators as $operator)
                            <option value="{{ $operator->id ?? ''}}">
                                {{ $operator->first_name ?? '' }} {{ $operator->last_name ?? ''}}
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
                </div>--}}

            


            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Start</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {

             // Borrower Select2
             $('#operator_id').select2({
                dropdownParent: $('#service-request-start-form-modal-content')
            });

            $('#operator_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('operator_id', data);
            });
        });

        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#operator_id').select2({
                dropdownParent: $('#service-request-start-form-modal-content')
            });
        });

        
    </script>


</div>