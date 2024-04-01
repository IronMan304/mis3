<div class="content">
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
                                        <div class="add-group">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <div class="top-nav-search table-search-blk">
                                    <form>
                                        <input type="text" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search">
                                        <a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="staff-search-table">

                        <div class="row">
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

                            <div class="col-6 col-md-6 col-xl-3">
                                <div class="doctor-submit">
                                    <button class="btn btn-primary submit-list-form me-2" wire:click="resetFilters">Reset Filters</button>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="staff-search-table">

                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-group local-forms cal-icon">
                                    <label>From </label>
                                    <input class="form-control datetimepicker" type="text" wire:model="dateFrom" id="dateFrom">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="form-group local-forms cal-icon">
                                    <label>To </label>
                                    <input class="form-control datetimepicker" type="text" wire:model="dateTo" id="dateFrom">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="doctor-submit">
                                    <button type="submit" class="btn btn-primary submit-list-form me-2" wire:click="applyFilters">Search</button>
                                </div>
                            </div>


                            <div class="col-12 col-md-6 col-xl-3">
                                <div class="doctor-submit">
                                    <button class="btn btn-primary submit-list-form me-2" wire:click="resetFilters">Reset Filters</button>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group local-forms">
                                <label for="dateFrom">Date From:</label>
                                <input type="date" class="form-control" wire:model="dateFrom" id="dateFrom">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group local-forms">
                                <label for="dateTo">Date To:</label>
                                <input type="date" class="form-control" wire:model="dateTo" id="dateTo">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-0 custom-table comman-table mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Requester</th>
                                    {{--<th>Category:Type</th>
									<th>Tool</th>--}}
                                    <th>Requested Thru</th>



                                    <th>Date Needed</th>
                                    <th>Return Date</th>
                                    <th>Operator</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $request)
                                <tr>
                                    <td>{{ $request->id }}</td>
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
                                        @if ($request->request_operator_keys->isNotEmpty())
                                        @foreach ($request->request_operator_keys as $request_operator_key)
                                        {{ $request_operator_key->operators->first_name ?? ''}} {{ $request_operator_key->operators->last_name ?? ''}} {{ $request_operator_key->status->description ?? ''}} {{--({{ $request_operator_key->toolStatus->description ?? ''}})--}}

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
</div>