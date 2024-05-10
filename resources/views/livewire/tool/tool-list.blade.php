<div class="content" id="list-content-tool">
	<style>
		#status-one-row {
			background-color: #00ff00;
			border-top: 5px solid #ddd;
			border-bottom: 5px solid #ddd;
		}

		#status-two-row {
			background-color: #ffff00;
			border-top: 5px solid #ddd;
			border-bottom: 5px solid #ddd;
		}

		#status-three-row {
			background-color: #808080;
			border-top: 5px solid #ddd;
			border-bottom: 5px solid #ddd;
		}

		#status-four-row {
			background-color: #ff0000;
			border-top: 5px solid #ddd;
			border-bottom: 5px solid #ddd;
		}
	</style>
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Equipment List</li>
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
									<h3>Equipment List</h3>
									<div class="doctor-search-blk">
										<div class="top-nav-search table-search-blk">
											<form>
												<input type="text" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search">
												<a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
											</form>
										</div>
										<div class="add-group">
											<a wire:click="createTool" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt title="Add Equipment">
											</a>
											<a wire:click="createTool" class="btn btn-primary ms-2 bt-sty" title="Import from Excel"><i class="fa-solid fa-file-import fs-6"></i>
											</a>
											<a wire:click="refreshPage" class="btn btn-primary doctor-refresh ms-2"><img src="assets/img/icons/re-fresh.svg" alt="" title="Refresh page"></a>
										</div>





									</div>
									@if($exporting)
									<div class="loading-indicator">Exporting...</div>
									@endif
									<div class="col-auto text-end float-end ms-auto download-grp">
										<a wire:click="exportToPdf" class="btn btn-light ms-2"><img src="assets/img/icons/pdf-icon-01.svg" alt="" title="Export to PDF"></a>
										<!-- <a href="javascript:;" class=" me-2"><img src="assets/img/icons/pdf-icon-02.svg" alt=""></a>
											<a href="javascript:;" class=" me-2"><img src="assets/img/icons/pdf-icon-03.svg" alt=""></a> -->
										<a href="javascript:;" class="btn btn-light ms-2"><img src="assets/img/icons/pdf-icon-04.svg" alt="" title="Export to Excel"></a>

									</div>
								</div>
							</div>
							{{--<div class="col-auto text-end float-end ms-auto download-grp">
								<div class="top-nav-search table-search-blk">
									<form>
										<input type="text" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search">
										<a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
							</form>
						</div>
					</div>--}}
					<div class="staff-search-table">

						<div class="row">
							<div class="col-12 col-md-6 col-xl-3">
								<div class="form-group local-forms">
									<label>Equipment Type </label>
									<select class="form-control " wire:model="type_id" wire:change="applyFilters" id="type_id">
										<option value="" selected>All Type</option>
										@foreach ($types as $type)
										<option value="{{ $type->id }}">
											{{ $type->description }}
										</option>
										@endforeach
									</select>

								</div>
							</div>
							<div class="col-12 col-md-6 col-xl-3">
								<div class="form-group local-forms">
									<label>Equipment Status </label>
									<select class="form-control" wire:model="status_id" wire:change="applyFilters" id="status_id">
										<option value="" selected>All Status</option>
										@foreach ($statuses as $status)
										<option value="{{ $status->id }}">
											{{ $status->description }}
										</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-12 col-md-6 col-xl-3">
								<div class="form-group local-forms">
									<label>Equipment Source </label>
									<select class="form-control" wire:model="source_id" wire:change="applyFilters" id="source_id">
										<option value="" selected>All Source</option>
										@foreach ($sources as $source)
										<option value="{{ $source->id }}">
											{{ $source->description }}
										</option>
										@endforeach
									</select>
								</div>
							</div>
							{{--<div class="col-12 col-md-6 col-xl-3">
									<div class="form-group local-forms cal-icon">
										<label>From </label>
										<input class="form-control datetimepicker" type="text">
									</div>
								</div>
								<div class="col-12 col-md-6 col-xl-3">
									<div class="form-group local-forms cal-icon">
										<label>To </label>
										<input class="form-control datetimepicker" type="text">
									</div>
								</div>--}}
							<!-- <div class="col-12 col-md-6 col-xl-3">
								<div class="doctor-submit">
									<button type="submit" class="btn btn-primary submit-list-form me-2">Search</button>
								</div>
							</div> -->
							<div class="col-12 col-md-6 col-xl-3">
								<div class="doctor-submit">
									<button class="btn btn-primary submit-list-form me-2" wire:click="resetFilters">Reset Filters</button>

								</div>
							</div>
							<div class="col-12 col-md-6 col-xl-3">
								<div class="form-group local-forms">
									<label>Equipment Applicability </label>
									<select class="form-control" wire:model="applicability_id" wire:change="applyFilters" id="applicability_id">
										<option value="" selected>All Applicability</option>
										@foreach ($applicabilities as $applicability)
										<option value="{{ $applicability->id }}">
											{{ $applicability->description }}
										</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="col-12 col-md-6 col-xl-3">
								<div class="form-group local-forms">
									<label>Equipment Security </label>
									<select class="form-control" wire:model="security_id" wire:change="applyFilters" id="security_id">
										<option value="" selected>All Security</option>
										@foreach ($applicabilities as $applicability)
										<option value="{{ $applicability->id }}">
											{{ $applicability->description }}
										</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="col-12 col-md-6 col-xl-3">
								<div class="form-group local-forms">
									<label>Equipment Owner </label>
									<select class="form-control" wire:model="owner_id" wire:change="applyFilters" id="owner_id">
										<option value="" selected>All Owner</option>
										@foreach ($borrowers as $borrower)
										<option value="{{ $borrower->id }}">
											{{ $borrower->first_name }} {{ $borrower->middle_name }} {{ $borrower->last_name }}
										</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

					</div>
				</div>



				<div class="table-responsive">
					<table class="table border-0 custom-table comman-table mb-0">
						<thead>
							<tr>
								<!-- <th>ID</th> -->
								<th>Type</th>
								<th>Property Number</th>
								<th>Brand</th>
								<th>Applicability</th>
								<th>Security</th>
								<th>Source</th>
								<!-- <th>Date Created</th> -->
								<!-- <th>Added By</th> -->
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($tools as $tool)
							<tr>
								<!-- <td>
									{{ $tool->id }}
								</td> -->
								<td>
									{{ $tool->type->description}}
								</td>
								<td>
									{{ $tool->property_number}}
								</td>
								<td>
									{{ $tool->brand }}
								</td>

								<td>
									@if ($tool->position_keys)
									@foreach ($tool->position_keys as $positionKey)
									- {{ $positionKey->positions->description ?? 'N/A' }}

									@if (!$loop->last)
									{{-- Add a Space or separator between department names --}}
									<br>
									@endif
									@endforeach

									@endif
									@if($tool->source_id == 4)
									{{ 'N/A'}}
									@endif
								</td>

								<td>
									@if ($tool->security_keys)
									@foreach ($tool->security_keys as $securityKey)
									- {{ $securityKey->securities->description ?? 'N/A'}}

									@if (!$loop->last)
									{{-- Add a Space or separator between department names --}}
									<br>
									@endif
									@endforeach
									@else
									No Tools Assigned
									@endif
									@if($tool->source_id == 4)
									{{ 'N/A'}}
									@endif
								</td>

								<td>
									{{$tool->source->description ?? ''}} <br>
									({{ $tool->owner->first_name ?? ''}} {{ $tool->owner->middle_name ?? ''}} {{ $tool->owner->last_name ?? ''}})
								</td>

								{{--<td class="appoint-time">
									<span>{{ $tool->created_at->setTimezone('Asia/Manila')->format('m-d-Y') }} at </span>
								{{ $tool->created_at->setTimezone('Asia/Manila')->format('h:i A') }}
								<br>
								{{ $tool->user->roles[0]->name ?? ''}}
								</td>--}}



								<!-- 
								<td> ({{ $tool->user->position->description ?? 'N/A' }}) <br>{{ $tool->user->first_name ?? '' }} {{ $tool->user->last_name ?? '' }}</td> -->

								{{-- green, pink, gray, orange, blue--}}

								@if($tool->source_id == 4)
								<td>
									<div class="btn-group" role="group">

										<button type="button" wire:click="toolLog({{ $tool->id }})" @if($tool->status_id == 1) class="custom-badge status-light-green" @elseif ($tool->status_id == 2) class="custom-badge status-blue" @elseif($tool->status_id == 3) class="custom-badge status-gray" @elseif($tool->status_id == 4) class="custom-badge status-red" @elseif($tool->status_id == 17) class="custom-badge status-grey" @elseif($tool->status_id == 14) class="custom-badge status-orange" @elseif($tool->status_id == 5) class="custom-badge status-pink" @elseif($tool->status_id == 21) class="custom-badge status-purple" @elseif($tool->status_id == 23) class="custom-badge status-green" @elseif($tool->status_id == 22) class="custom-badge status-dark-purple" @endif>
											{{ $tool->status->description ?? ''}}
										</button>

									</div>
								</td>
								@else
								<td>
									<button @if($tool->status_id == 1) class="custom-badge status-light-green" @elseif ($tool->status_id == 2) class="custom-badge status-blue" @elseif($tool->status_id == 3) class="custom-badge status-gray" @elseif($tool->status_id == 4) class="custom-badge status-red" @elseif($tool->status_id == 17) class="custom-badge status-gray" @elseif($tool->status_id == 14) class="custom-badge status-orange" @elseif($tool->status_id == 5) class="custom-badge status-pink" @elseif($tool->status_id == 21) class="custom-badge status-purple" @elseif($tool->status_id == 23) class="custom-badge status-green" @elseif($tool->status_id == 22) class="custom-badge status-dark-purple" @endif>
										{{ $tool->status->description ?? ''}}
									</button>
								</td>
								@endif



								<td class="text-center">
									<div class="btn-group" role="group">

										@can('view-tools-history')
										<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="toolLog({{ $tool->id }})" title="Log">
											<i class="fa-solid fa-list"></i>
										</button>
										@endcan

										@can('view-tools-edit')
										<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editTool({{ $tool->id }})" title="Edit">
											<i class='fa fa-pen-to-square'></i>
										</button>
										@endcan
										<!-- <a class="btn btn-danger btn-sm mx-1" wire:click="deleteTool({{ $tool->id }})" title="Delete">
													<i class="fa fa-trash"></i>
												</a> -->
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
	{{-- $tools->links() --}}

</div>
{{-- Modal --}}

<div wire.ignore.self class="modal fade" id="toolModal" tabindex="-1" role="dialog" aria-labelledby="toolModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<livewire:tool.tool-form />
	</div>
</div>

<div wire.ignore.self class="modal fade" id="toolLogModal" tabindex="-1" role="dialog" aria-labelledby="toolLogModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<livewire:tool.tool-log />
	</div>
</div>

<script>
	document.addEventListener('livewire:load', function() {
		// Type Select2
		$('#type_id').select2({
			dropdownParent: $('#list-content-tool')
		});

		$('#type_id').on('change', function(e) {
			let data = $(this).val();
			console.log(data);
			@this.set('type_id', data);
		});

		// Status Select2
		$('#status_id').select2({
			dropdownParent: $('#list-content-tool')
		});

		$('#status_id').on('change', function(e) {
			let data = $(this).val();
			console.log(data);
			@this.set('status_id', data);
		});

		// Source Select2
		$('#source_id').select2({
			dropdownParent: $('#list-content-tool')
		});

		$('#source_id').on('change', function(e) {
			let data = $(this).val();
			console.log(data);
			@this.set('source_id', data);
		});

		// Applicability Select2
		$('#applicability_id').select2({
			dropdownParent: $('#list-content-tool')
		});

		$('#applicability_id').on('change', function(e) {
			let data = $(this).val();
			console.log(data);
			@this.set('applicability_id', data);
		});

		// Security Select2
		$('#security_id').select2({
			dropdownParent: $('#list-content-tool')
		});

		$('#security_id').on('change', function(e) {
			let data = $(this).val();
			console.log(data);
			@this.set('security_id', data);
		});

		// Owner Select2
		$('#owner_id').select2({
			dropdownParent: $('#list-content-tool')
		});

		$('#owner_id').on('change', function(e) {
			let data = $(this).val();
			console.log(data);
			@this.set('owner_id', data);
		});

		Livewire.on('refreshPage', function() {
			window.location.reload();
		});

	});


	document.addEventListener('livewire:update', function() {
		// Refresh Select2 on Livewire update
		$('#owner_id, #type_id, #status_id, #source_id, #applicability_id, #security_id, #owner_id').select2({
			dropdownParent: $('#list-content-tool')
		});
	});
</script>

</div>

@section('custom_script')
@include('layouts.scripts.tool-scripts')
@endsection