<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Service Request List</li>
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
									<h3>Service Request List</h3>
									<div class="doctor-search-blk">
										<div class="add-group">
											<a wire:click="createServiceRequest" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
											</a>
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

					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table mb-0">
							<thead>
								<tr>
									<td>Requester</td>
									<th>Source</th>
									<th>Service</th>
									<th>Equipment Type</th>
									<th>Property Number</th>
									<th>Operator</th>
									<th>Appointed Date</th>
									<th>Status</th>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($service_requests as $service_request)
								<tr>
									<td>
										{{ $service_request->borrower->first_name ?? ''}}
									</td>
									<td>
										{{ $service_request->tool->source->description ?? ''}}
									</td>
									<td>
										{{$service_request->service->description ?? ''}}
									</td>
									<td>
										{{ $service_request->tool->type->description ?? ''}}
									</td>
									<td>
										{{ $service_request->tool->property_number ?? ''}}: {{ $service_request->ToolStatus->description ?? ''}}
									</td>
									<td>
										{{ $service_request->operator->first_name ?? 'TBA'}}
									</td>
									<td>
										{{ $service_request->set_date ?? ''}}
									</td>
									<td>
										{{ $service_request->status->description ?? ''}}
									</td>

									<td class="text-center">
										<div class="btn-group" role="group">

											@can('view-service-requests-review')
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="createAssignSROperator({{ $service_request->id }})" title="Assign">
												<i class="fa-solid fa-calendar"></i>
											</button>
											@endcan

											@can('view-service-requests-start')
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="serviceRequestStart({{ $service_request->id }})" title="Start" {{--@if ($request->status_id != 10) disabled @endif--}}>
												<i class="fa-solid fa-play"></i>
											</button>
											@endcan

											@can('view-service-requests-return')
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="returnSRequest({{ $service_request->id }})" title="Return" style="background: linear-gradient(to right, red 50%, blue 50%);">
												<i class="fa-solid fa-arrow-right-arrow-left"></i>
											</button>
											@endcan

											<!-- <a wire:click="createAssignSROperator" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
											</a> -->
											<!-- <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editServiceRequest({{ $service_request->id }})" title="Edit">
												<i class='fa fa-pen-to-square'></i>
											</button> -->
											@can('view-service-requests-delete')
											<a class="btn btn-danger btn-sm mx-1" wire:click="deleteServiceRequest({{ $service_request->id }})" title="Delete">
											<i class="fa fa-trash"></i>
											</a>
											@endcan
										</div>
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
		{{ $service_requests->links() }}
	</div>
	<div wire.ignore.self class="modal fade" id="serviceRequestModal" tabindex="-1" role="dialog" aria-labelledby="serviceRequestModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:service-request.service-request-form />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="assignSROperatorModal" tabindex="-1" role="dialog" aria-labelledby="assignSROperatorModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:service-request.assign-s-r-operator />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="serviceRequestStartModal" tabindex="-1" role="dialog" aria-labelledby="serviceRequestStartModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:service-request.service-request-start />
		</div>
	</div>
	<div wire.ignore.self class="modal fade" id="sreturnModal" tabindex="-1" role="dialog" aria-labelledby="sreturnModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:service-request.return-form />
		</div>
	</div>

</div>
{{-- Modal --}}


@section('custom_script')
@include('layouts.scripts.service-request-scripts')
@endsection