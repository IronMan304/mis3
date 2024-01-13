<div class="content">
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
										<div class="add-group">
											<a wire:click="createTool" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto text-end float-end ms-auto download-grp">
								<div class="top-nav-search table-search-blk">
									<form>
										<input type="text" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search" name="search">
										<a class="btn"><img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt></a>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr>
									<th>Type</th>
									<th>Property Number</th>
									<td>Brand</td>
									<th>Date Updated</th>
									<th>Added By</th>
									<th>Status</th>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>

								@foreach ($tools as $tool)
								<tr id="{{ $tool->status_id == 1 ? 'status-one-row' : ($tool->status_id == 2 ? 'status-two-row' : ($tool->status_id == 3 ? 'status-three-row' : ($tool->status_id == 4 ? 'status-four-row' : ''))) }}">
									<td>
										{{ $tool->type->description}}
									</td>
									<td>
										{{ $tool->property_number}}
									</td>
									<td>
										{{ $tool->brand }}
									</td>

									<td>{{ $tool->updated_at->setTimezone('Asia/Manila')->format('m-d-Y H:i:s') }}</td>


									<td> ({{ $tool->user->position ?? 'N/A' }}) {{ $tool->user->first_name ?? '' }} {{ $tool->user->last_name ?? '' }}</td>

									<td>
										{{ $tool->status->description ?? ''}}
									</td>


									<td class="text-center">
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editTool({{ $tool->id }})" title="Edit">
												<i class='fa fa-pen-to-square'></i>
											</button>
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
	</div>
	{{-- Modal --}}

	<div wire.ignore.self class="modal fade" id="toolModal" tabindex="-1" role="dialog" aria-labelledby="toolModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:tool.tool-form />
		</div>
	</div>
</div>

@section('custom_script')
@include('layouts.scripts.tool-scripts')
@endsection