<div class="content" id="list-content-tool-request-report">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active">Equipment Request Report</li>
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
                                    <h3>Equipment Request Report</h3>
                                    <div class="doctor-search-blk">
                                        <div class="top-nav-search table-search-blk">
                                            <p>{{ $rn }}</p>
                                            <form>
                                                <input type="text" id="searchBox" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search">
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
                                <div wire:loading wire:target="exportToPdf" class="text-dark">Exporting... Please wait...</div>
                                <a wire:click="exportToPdf" class="btn btn-light ms-2"><img src="assets/img/icons/pdf-icon-01.svg" alt="" title="Export to PDF"></a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-search-table">

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group local-forms">
                                    <label for="date">Request Date</label>
                                    <input type="date" class="form-control" wire:model="date" id="date">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group local-forms">
                                    <label for="dateFrom">Date From:</label>
                                    <input type="date" class="form-control" wire:model="dateFrom" id="dateFrom">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group local-forms">
                                    <label for="dateTo">Date To:</label>
                                    <input type="date" class="form-control" wire:model="dateTo" id="dateTo">
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
                                    <select class="form-control" wire:model="type_id" wire:change="applyFilters">
                                        <option value="" selected>All Types</option>
                                        <option value="mobile">Mobile</option>
                                        <option value="ftof">FTOF</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-group local-forms">
                                    <label>Equipment Category </label>
                                    <select class="form-control" wire:model="category_id" wire:change="applyFilters" id="category_id">
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
                                    <select class="form-control" wire:model="tool_type_id" wire:change="applyFilters" id="tool_type_id">
                                        <option value="" selected>All Equipment Types</option>
                                        @foreach ($types as $type)
                                        @if($type->category_id == $category_id)
                                        <option value="{{ $type->id }}">
                                            {{ $type->description }}
                                        </option>
                                        @elseif(!$category_id)
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
                                    <select class="form-control" wire:model="tool_id" wire:change="applyFilters" id="tool_id">
                                        <option value="" selected>All Equipments</option>
                                        @foreach ($tools as $tool)
                                        @if($tool->type_id == $tool_type_id)
                                        <option value="{{ $tool->id }}">
                                            {{ $tool->property_number }}
                                        </option>
                                        @elseif(!$tool_type_id)
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
                                    <select class="form-control" wire:model="borrower_id" wire:change="applyFilters" id="borrower_id">
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
                                    <select class="form-control" wire:model="operator1_id" wire:change="applyFilters" id="operator1_id">
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
                                    <th>Request Number</th>
                                    <th>Requester</th>
                                    {{--<th>Category:Type</th>
									<th>Tool</th>--}}
                                    <th>Requested Thru</th>



                                    <th>Date Needed</th>
                                    <th>Return Date</th>
                                    <th>Operator</th>
                                    <th>Category: Type</th>
                                    <th>Equipment</th>
                                    <th>Status</th>
                                    <th>Date Requested</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $request)
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>{{ $request->request_number}}</td>

                                    <td>
                                        {{ $request->borrower->first_name ?? '' }} {{ $request->borrower->middle_name ?? '' }} {{ $request->borrower->last_name ?? '' }}
                                    </td>
                                    <td>
                                        @if($request->borrower)
                                        @if($request->borrower->user_id == $request->user_id)
                                        {{ 'Online (Mobile app)' }} <br>
                                        {{ $request->borrower->user->email ?? ''}}
                                        @else
                                        {{ 'Offline (Face to Face)' }} <br>
                                        {{ $request->user->email ?? ''}}
                                        @endif
                                        @else
                                        {{ 'NULL' }}
                                        @endif
                                    </td>

                                    <td>
                                        {{ $request->date_needed ?? ''}}
                                    </td>
                                    <td>
                                        {{ $request->estimated_return_date ?? ''}}
                                    </td>

                                    <td>
                                        @if ($request->RequestOperatorKey->isNotEmpty())
                                        @foreach ($request->RequestOperatorKey as $request_operator_key)
                                        {{ $request_operator_key->operator->first_name ?? ''}} {{ $request_operator_key->operator->last_name ?? ''}} {{ $request_operator_key->status->description ?? ''}} {{--({{ $request_operator_key->toolStatus->description ?? ''}})--}}

                                        @if (!$loop->last)
                                        {{-- Add a Space or separator between department names --}}
                                        <br>
                                        @endif
                                        @endforeach
                                        @elseif ($request->option_id == 1)
                                        {{ 'TBA' }}
                                        @endif

                                        @if ($request->option_id == 2)
                                        {{ 'N/A' }}
                                        @endif
                                    </td>


                                    <!-- Equipment Category: Type -->
                                    <td>
                                        @if ($request->tool_keys)
                                        @foreach ($request->tool_keys as $toolKey)
                                        {{ $toolKey->tools->type->category->description }}: {{ $toolKey->tools->type->description }}
                                        @if (!$loop->last)
                                        <br>
                                        @endif
                                        @endforeach
                                        @else
                                        No Tools Assigned
                                        @endif
                                    </td>

                                    <!-- Equipment -->
                                    <td>
                                        @if ($request->tool_keys)
                                        @foreach ($request->tool_keys as $toolKey)
                                        {{ $toolKey->tools->property_number ?? ''}}: {{ $toolKey->status->description ?? ''}} ({{ $toolKey->toolStatus->description ?? ''}})

                                        @if (!$loop->last)
                                        {{-- Add a Space or separator between department names --}}
                                        <br>
                                        @endif
                                        @endforeach
                                        @else
                                        No Tools Assigned
                                        @endif
                                    </td>

                                    <td>
                                        {{'Request'}}: {{ $request->status->description ?? ''}}
                                        <br>

                                        @if ($request->tool_keys)
                                        @php
                                        $shownSecurityIds = []; // Initialize an array to keep track of shown security IDs
                                        $hasContent = false;
                                        @endphp

                                        @foreach ($request->tool_keys as $toolKey)
                                        @foreach ($toolKey->rtts_keys as $rtts_key)
                                        {{-- Check if the security ID has already been shown --}}
                                        @if (!in_array($rtts_key->security->description, $shownSecurityIds))
                                        {{ $rtts_key->security->description }}: {{ $rtts_key->status->description ?? ''}}<br>



                                        @php
                                        $shownSecurityIds[] = $rtts_key->security->description;
                                        $hasContent = true;
                                        @endphp

                                        @endif
                                        @endforeach


                                        @endforeach

                                        @endif
                                    </td>

                                    <td>
                                        {{ $request->created_at }}
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

            //Category Select2
            $('#category_id').select2({
                dropdownParent: $('#list-content-tool-request-report')
            });

            $('#category_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('category_id', data);
            });

            // Tool Type Select2
            $('#tool_type_id').select2({
                dropdownParent: $('#list-content-tool-request-report')
            });

            $('#tool_type_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('tool_type_id', data);
            });

            // Tool Select2
            $('#tool_id').select2({
                dropdownParent: $('#list-content-tool-request-report')
            });

            $('#tool_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('tool_id', data);
            });

            // Borrower Select2
            $('#borrower_id').select2({
                dropdownParent: $('#list-content-tool-request-report')
            });

            $('#borrower_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('borrower_id', data);
            });

            // Operator Select2
            $('#operator1_id').select2({
                dropdownParent: $('#list-content-tool-request-report')
            });

            $('#operator1_id').on('change', function(e) {
                let data = $(this).val();
                console.log(data);
                @this.set('operator1_id', data);
            });

        });

        document.addEventListener('livewire:update', function() {
            // Refresh Select2 on Livewire update
            $('#category_id, #tool_type_id, #tool_id, #borrower_id, #operator_id').select2({
                dropdownParent: $('#list-content-tool-request-report')
            });
        });
    </script>


</div>