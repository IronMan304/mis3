<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Operator List</li>
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
									<h3>Operator List</h3>
									<div class="doctor-search-blk">
										<div class="add-group">
											<a wire:click="createOperator" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
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
									<th>First name</th>
									<th>Middle name</th>
									<th>Last name</th>
									<th>Contact number</th>
									<th>Gender</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($operators as $operator)
								<tr>
									<td>
										{{ $operator->first_name ?? '' }}
									</td>
									<td>
										{{ $operator->middle_name ?? '' }}
									</td>
									<td>
										{{ $operator->last_name ?? '' }}
									</td>
									<td>
										{{ $operator->contact_number ?? '' }}
									</td>
									<td>
										{{ $operator->sex->description ?? '' }}
									</td>
									<td>
										{{ $operator->status->description ?? ''}}
									</td>

									<td class="text-center">
										<div class="btn-group" role="group">

											@if(auth()->user()->hasRole('admin'))
											@if ($operator->user_id == null)
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="createOperatorAccount({{ $operator->id }})" title="Add">
												<i class="fa-solid fa-user-plus"></i>
											</button>
											@endif
											@if($operator->user_id != null)
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="createOperatorAccount({{ $operator->id }})" title="Add" disabled>
												<i class="fa-solid fa-user-check"></i>
											</button>
											@endif
											@endif

											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editOperator({{ $operator->id }})" title="Edit">
												<i class='fa fa-pen-to-square'></i>
											</button>
											{{--<a class="btn btn-danger btn-sm mx-1" wire:click="deleteOperator({{ $operator->id }})" title="Delete">
											<i class="fa fa-trash"></i>
											</a>--}}
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
				{{ $operators->links() }}
	</div>
	{{-- Modal --}}
	<div wire.ignore.self class="modal fade" id="operatorModal" tabindex="-1" role="dialog" aria-labelledby="operatorModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:operator.operator-form />
		</div>
	</div>
	<div wire.ignore.self class="modal fade" id="operatorAccountModal" tabindex="-1" role="dialog" aria-labelledby="operatorAccountModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:operator.operator-account-form />
		</div>
	</div>
</div>



@section('custom_script')
@include('layouts.scripts.operator-scripts')
@endsection