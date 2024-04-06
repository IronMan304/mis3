<div class="content" id="list-content-service-request-report">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active">Service Request Report</li>
                </ul>
            </div>
        </div>
    </div>
    <livewire:flash-message.flash-message />
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card card-table show-entire">
                <div class="card-body">

                    <div class="page-table-header mb-2">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="doctor-table-blk">
                                    <h3>Service Request Report</h3>
                                    <div class="doctor-search-blk">
                                        <div class="top-nav-search table-search-blk">
                                            <form>
                                                <input type="text" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search">
                                                <a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
                                            </form>
                                        </div>
                                        <div class="add-group">
                                            <a href="javascript:;" class="btn btn-primary doctor-refresh ms-2"><img src="assets/img/icons/re-fresh.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">

                            </div>
                        </div>
                    </div>

                    <div class="staff-search-table">

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group local-forms">
                                    <label for="date">Request Date</label>
                                    <input type="date" class="form-control" wire:model="sdate" id="sdate">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group local-forms">
                                    <label for="dateFrom">Date From:</label>
                                    <input type="date" class="form-control" wire:model="sdateFrom" id="sdateFrom">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group local-forms">
                                    <label for="dateTo">Date To:</label>
                                    <input type="date" class="form-control" wire:model="sdateTo" id="sdateTo">
                                </div>
                            </div>


                            <div class="col-6 col-md-6 col-xl-3">
                                <div class="doctor-submit">
                                    <button class="btn btn-primary submit-list-form me-2" wire:click="resetFilters">Reset Filters</button>

                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-group local-forms">
                                    <label>Request Type </label>
                                    <select class="form-control" wire:model="stype_id" wire:change="applyFilters">
                                        <option value="" selected>All Types</option>
                                        <option value="mobile">Mobile</option>
                                        <option value="ftof">FTOF</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-group local-forms">
                                    <label>Equipment Category </label>
                                    <select class="form-control" wire:model="scategory_id" wire:change="applyFilters" id="scategory_id">
                                        <option value="" selected>All Equipment Categories</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->description }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-group local-forms">
                                    <label>Equipment Type </label>
                                    <select class="form-control" wire:model="stool_type_id" wire:change="applyFilters" id="stool_type_id">
                                        <option value="" selected>All Equipment Types</option>
                                        @foreach ($types as $type)
                                        @if($type->category_id == $scategory_id)
                                        <option value="{{ $type->id }}">
                                            {{ $type->description }}
                                        </option>
                                        @elseif(!$scategory_id)
                                        <option value="{{ $type->id }}">
                                            {{ $type->description }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-group local-forms">
                                    <label>Equipment </label>
                                    <select class="form-control" wire:model="stool_id" wire:change="applyFilters" id="stool_id">
                                        <option value="" selected>All Equipments</option>
                                        @foreach ($tools as $tool)
                                        @if($tool->type_id == $stool_type_id)
                                        <option value="{{ $tool->id }}">
                                            {{ $tool->property_number }}
                                        </option>
                                        @elseif(!$stool_type_id)
                                        <option value="{{ $tool->id }}">
                                            {{ $tool->property_number }}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-group local-forms">
                                    <label>Requester </label>
                                    <select class="form-control" wire:model="sborrower_id" wire:change="applyFilters" id="sborrower_id">
                                        <option value="" selected>All Requesters</option>
                                        @foreach ($borrowers as $borrower)
                                        <option value="{{ $borrower->id }}">
                                            {{ $borrower->first_name }} {{ $borrower->middle_name }} {{ $borrower->last_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-group local-forms">
                                    <label>Operators </label>
                                    <select class="form-control" wire:model="soperator_id" wire:change="applyFilters" id="soperator_id">
                                        <option value="" selected>All Operators</option>
                                        @foreach ($operators as $operator)
                                        <option value="{{ $operator->id }}">
                                            {{ $operator->first_name }} {{ $operator->middle_name }} {{ $operator->last_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="table-responsive">
                        <table class="table border-0 custom-table comman-table mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Requester</th>
                                    <th>Requested Thru</th>
                                    <th>Source</th>
                                    <th>Service</th>
                                    <th>Operator</th>
                                    <th>Category: Type</th>
                                    <th>Equipment</th>
                                    <th>Date Scheduled</th>
                                    <th>Status</th>
                                    <th>Date Requested</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $service_request)
                                <tr>
                                    <td>{{ $service_request->id }}</td>
                                    <td>
                                        {{ $service_request->borrower->first_name ?? '' }} {{ $service_request->borrower->middle_name ?? '' }} {{ $service_request->borrower->last_name ?? '' }}
                                    </td>
                                    <td>
                                        @if($service_request->borrower)
                                        @if($service_request->borrower->user_id == $service_request->user_id)
                                        {{ 'Online (Mobile app)' }} <br>
                                        {{ $service_request->borrower->user->email ?? ''}}
                                        @else
                                        {{ 'Offline (Face to Face)' }} <br>
                                        {{ $service_request->user->email ?? ''}}
                                        @endif
                                        @else
                                        {{ 'NULL' }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $service_request->tool->source->description ?? ''}}
                                    </td>

                                    <td>
                                        {{$service_request->service->description ?? ''}}
                                    </td>

                                    <td>
                                        {{ $service_request->operator->first_name ?? 'TBA'}}
                                    </td>

                                    <td>
                                    {{ $service_request->tool->type->category->description ?? ''}}: {{ $service_request->tool->type->description ?? ''}}
                                    </td>
                                    <td>
                                        {{ $service_request->tool->property_number ?? ''}}
                                    </td>

                                    <td>
                                        {{ $service_request->set_date ?? ''}}
                                    </td>
                                    <td>
                                        {{ $service_request->status->description ?? ''}}
                                    </td>

                                    <td>
                                        {{ $service_request->created_at }}
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination links -->
        {{ $requests->links() }}
    </div>
    <script>
        document.addEventListener('livewire:load', function() {

            // Category Select2
            $('#scategory_id').select2({
                dropdownParent: $('#list-content-service-request-report')
            });

            $('#scategory_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('scategory_id', data);
            });

            // Tool Type Select2
            $('#stool_type_id').select2({
                dropdownParent: $('#list-content-service-request-report')
            });

            $('#stool_type_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('stool_type_id', data);
            });

              // Tool Select2
              $('#stool_id').select2({
                dropdownParent: $('#list-content-service-request-report')
            });

            $('#stool_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('stool_id', data);
            });

            // Borrower Select2
            $('#sborrower_id').select2({
                dropdownParent: $('#list-content-service-request-report')
            });

            $('#sborrower_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('sborrower_id', data);
            });

              // Operator Select2
              $('#soperator_id').select2({
                dropdownParent: $('#list-content-service-request-report')
            });

            $('#soperator_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('soperator_id', data);
            });



        });

        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#scategory_id, #stool_type_id, #stool_id, #sborrower_id, #soperator_id').select2({
                dropdownParent: $('#list-content-service-request-report')
            });
        });
    </script>
</div>