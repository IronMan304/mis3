<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Log List</li>
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
									<h3>Log List</h3>
									<div class="doctor-search-blk">
										<div class="add-group">
											{{--<a wire:click="createLog" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
											</a>--}}
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
									<th>User</th>
									<th>Role</th>
									<th>Type</th>
									<th>Event</th>
									<th>Properties</th>
									<!-- <th>Description</th> -->
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($logs as $activity)
								<tr>
									<td>
										{{ $activity->causer->first_name ?? ''}} {{ $activity->causer->middle_name ?? ''}} {{ $activity->causer->last_name ?? ''}}
									</td>
									<td>
										@foreach($activity->causer->roles as $role)
										<li>{{ $role->name }}</li>
										@endforeach
										<br>
									</td>


									{{--<td>
										{{ $activity->subject->description ?? '' }}
									</td>--}}
									<td>{{ class_basename($activity->subject_type) }}</td> <!-- Display only the model name -->

									<td>{{ $activity->event ?? ''}}</td>


									<td>
										@foreach($activity->properties as $key => $value)
										<li>{{ $key }}: {{ $value }}</li>
										@endforeach
									</td>

									{{--<td>
										{{ $activity->description }}
									</td>--}}

									<td>{{ $activity->created_at }}</td>

								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				{{ $logs->links() }}
			</div>
		</div>
	</div>
</div>
{{-- Modal 

<div wire.ignore.self class="modal fade" id="sexModal" tabindex="-1" role="dialog" aria-labelledby="sexModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered">
		<livewire:sex.sex-form />
	</div>
</div>
@section('custom_script')
@include('layouts.scripts.sex-scripts')
@endsection
--}}