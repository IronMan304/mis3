<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Equipment Request List</li>


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
									<h3>Equipment Request List</h3>
									<div class="doctor-search-blk">
										<div class="col-auto text-end float-end ms-auto download-grp">
											<div class="top-nav-search table-search-blk">
												<form>
													<input type="text" id="searchBox" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search">
													<a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
												</form>
											</div>
										</div>
										<div class="add-group">
											<a wire:click="createRequest" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
											</a>
										</div>
									</div>
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
									<th>Date Needed</th>
									<th>Return Date</th>
									<th>Equipment Category: Type</th>
									<th>Equipment</th>
									<th>Operator</th>
									<th>Status</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								@foreach ($requests as $request)
								<tr>
									<td>{{ $request->id }}</td>
									<td>{{ $request->request_number ?? ''}}</td>
									<td>
										{{ $request->borrower->first_name ?? '' }}
									</td>




									{{--<td>
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

									<td>
										@if ($request->tool_keys)
										@foreach ($request->tool_keys as $toolKey)
										{{ $toolKey->tools->brand ?? ''}}: {{ $toolKey->status->description ?? ''}} ({{ $toolKey->toolStatus->description ?? ''}})

										@if (!$loop->last)
										Add a Space or separator between department names
										<br>
										@endif
										@endforeach
										@else
										No Tools Assigned
										@endif
									</td>--}}



									<!-- <td>
										@if ($request->tool_keys)
										@foreach ($request->tool_keys as $toolKey)
										{{ $toolKey->status->description ?? ''}}
										@if (!$loop->last)
										{{-- Add a Space or separator between department names --}}
										<br>
										@endif
										@endforeach
										@else
										No Tools Assigned
										@endif
									</td> -->


									<td>
										{{ $request->date_needed ?? ''}}
									</td>
									<td>
										{{ $request->estimated_return_date ?? ''}}
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
										{{ $toolKey->tools->brand ?? '' }}: {{ $toolKey->tools->property_number ?? '' }}: {{ $toolKey->status->description ?? '' }} {{ isset($toolKey->toolStatus->description) ? '(' . $toolKey->toolStatus->description . ')' : '' }}

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
										@if ($request->RequestOperatorKey->isNotEmpty())
										@foreach ($request->RequestOperatorKey as $request_operator_key)
										{{ $request_operator_key->operator->first_name ?? 'n'}} {{ $request_operator_key->operator->last_name ?? ''}} {{ $request_operator_key->status->description ?? ''}} {{--({{ $request_operator_key->toolStatus->description ?? ''}})--}}

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




									@php




									$request = \App\Models\Request::with('tool_keys.tools')->findOrFail($request->id);
									$this->toolItems = $request->tool_keys->pluck('tool_id')->toArray();
									foreach ($this->toolItems as $toolId) {

									// Assuming you have fetched the current user and the tool
									//$user = auth()->user();
									//$role = $user->roles->first();
									//$roleId = $role->id;
									$userPositionId = auth()->user()->position_id;
									$toolSecurityIds = \App\Models\ToolSecurity::where('tool_id', $toolId)->pluck('security_id')->toArray();
									// Check if the tool is approved
									$toolKey = $request->tool_keys->where('tool_id', $toolId)->first();


									$securityButton = false;
									$approvedTool = false;

									foreach ($toolSecurityIds as $securityId) {
									if ($userPositionId == $securityId ) {
									// If position_id matches any of the security_id, set securityButton to true
									$securityButton = true;
									break;
									}
									}
									}

									/*if ($request->tool_keys){
									foreach ($request->tool_keys as $toolKey){
									if ($toolKey->status_id == 10 && $userPositionId == $securityId) { //10 means approved tools
									$approvedTool = true;
									break;
									}
									}
									}*/
									@endphp



									<td class="text-center">
										<div class="btn-group" role="group">
											{{--<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editRequest({{ $request->id }})" title="Edit">
											<i class='fa fa-pen-to-square'></i>
											</button>--}}
											@if ($request->tool_keys)
											{{--@if($request->status_id == 11)
												<button class="btn btn-success btn-sm mx-1" type="button" wire:click="approveRequest({{ $request->id }})">
											<i class="fa-solid fa-thumbs-up"></i>
											</button>
											@endif--}}
											@can('view-equipment-requests-logs')
											<button type="button" class="btn btn-secondary btn-sm mx-1" wire:click="viewRequestTool({{ $request->id }})" title="View Tool">
												<i class="fa-solid fa-list"></i>
											</button>
											@endcan

											@can('view-equipment-requests-equipment-approval')
											@if($request->status_id == 11)
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="approvalRequest({{ $request->id }})" title="Approval" style="background: linear-gradient(to right, red 50%, blue 50%);">
												<i class="fas fa-toggle-on"></i>

											</button>
											@endif
											@endcan

											@endif
											<!-- 
											@if ($request->tool_keys)
											@php $returnButtonShown = false; @endphp

											@foreach ($request->tool_keys as $toolKey)
											@if ($toolKey->status_id == 7)
											{{-- If any tool key has a status of 7, do not show the button --}}
											@php $returnButtonShown = true; @endphp
											@break
											@endif

											@if ($toolKey->status_id == 6 && !$returnButtonShown)
											{{-- Show the button only if the status is 6 and no previous tool key has a status of 7 --}}
											@php $returnButtonShown = true; @endphp
											<a class="btn btn-danger btn-sm mx-1" wire:click="handleCancelRequest({{ $request->id }})" title="Cancel">
												<i class="fa fa-trash"></i>
											</a>
											@elseif ($toolKey->status_id == 8 && !$returnButtonShown)
											{{-- If the status is 8 and no previous tool key has a status of 7, show the disabled button --}}
											@php $returnButtonShown = true; @endphp
											<button disabled>Cancelled</button>
											@endif
											@endforeach
											@endif -->

											@if($securityButton || auth()->user()->hasRole('admin') || auth()->user()->can('view-equipment-requests-request-approval'))
											@if($request->status_id == 16)
											<button type="button" class="btn btn-warning1 btn-sm mx-1" wire:click="securityApprovalForm({{ $request->id }})" title="Letter">
												<i class="fa-solid fa-envelope"></i>
											</button>
											@endif
											@endif

											@can('view-equipment-requests-start')
											@if($request->status_id == 10)
											<button type="button" class="btn btn-success btn-sm mx-1" wire:click="requestStartForm({{ $request->id }})" title="Start" {{--@if ($request->status_id != 10) disabled @endif--}}>
												<i class="fa-solid fa-play"></i>
											</button>
											@endif
											@endcan

											@can('view-equipment-requests-return')
											@if ($request->tool_keys)
											@php $returnButtonShown = false; @endphp
											@foreach ($request->tool_keys as $toolKey)
											@if(!$returnButtonShown)
											@php $returnButtonShown = true; @endphp
											@if($request->status_id == 6)
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="returnRequest({{ $request->id }})" title="Return" style="background: linear-gradient(to right, red 50%, blue 50%);" {{--@if ($toolKey->status_id != 6) disabled @endif--}}>
												<i class="fa-solid fa-arrow-right-arrow-left"></i>
											</button>
											@endif
											@endif
											@endforeach
											@endif
											@endcan
											
											@can('view-equipment-requests-cancel')
											@if($request->status_id == 11 || $request->status_id == 10 || $request->status_id == 6 || $request->status_id == 16)
											<button type="button" class="btn btn-danger btn-sm mx-1" wire:click="cancelRequest({{ $request->id }})" title="Cancel"  >
											<i class="fa-solid fa-rectangle-xmark"></i>
											</button>
											@endif
											@endcan
										</div>
									</td>

									{{----}}
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		{{--@if (!empty($this->search)) 
		<!-- Pagination links -->
		{{ $requests->links() }}
		@endif--}}
	</div>
	{{-- Modal --}}

	<div wire.ignore.self class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:request.request-form />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="cancelRequestModal" tabindex="-1" role="dialog" aria-labelledby="cancelRequestModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:request.cancel-request />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="returnModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:request.return-form />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="requestToolViewModal" tabindex="-1" role="dialog" aria-labelledby="requestToolViewModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<livewire:request.request-tool-view />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:request.approval-form />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="securityApprovalModal" tabindex="-1" role="dialog" aria-labelledby="securityApprovalModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<livewire:request.security-approval-form />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="requestStartFormModal" tabindex="-1" role="dialog" aria-labelledby="requestStartFormModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:request.request-start-form />
		</div>
	</div>

</div>
{{--<script>
	// Function to get the value of a query parameter from the URL
	function getQueryParam(name) {
		const urlParams = new URLSearchParams(window.location.search);
		return urlParams.get(name);
	}

	// Function to set the value of the search input field
	function populateSearchBox() {
		// Get the search input field
		var searchBox = document.getElementById('searchBox');

		// Get the value of the 'rn' parameter from the URL
		var rnValue = getQueryParam('rn');

		// Set the value of the search input field to the value of 'rn' from the URL
		if (rnValue !== null) {
			searchBox.value = rnValue;
		}
	}

	// Call the populateSearchBox function when the page loads
	window.onload = populateSearchBox;
</script>--}}

@section('custom_script')
@include('layouts.scripts.request-scripts')
@endsection

{{--
@if ($request->tool_keys)
@foreach ($request->tool_keys as $toolKey)
@if($tool_securities->find($toolKey->tools->id)->security_id == auth()->user()->position_id)
<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="approvalRequest({{ $request->id }})" title="Approval" style="background: linear-gradient(to right, red 50%, blue 50%);">
<i class="fa-solid fa-arrow-right-arrow-left"></i>
</button>
@endif
@endforeach
@endif
--}}