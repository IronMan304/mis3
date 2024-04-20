<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Borrower List</li>
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
									<h3>Requester List</h3>
									<div class="doctor-search-blk">
										<div class="add-group">
											<a wire:click="createBorrower" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
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
						<table id="borrower-table" class="table border-0 custom-table comman-table mb-0">
							<thead>
								<tr>
									<th>Borrower</th>
									<th>Id Number</th>
									<th>Contact Number</th>
									<th>Sex</th>
									<th>Position</th>
									<th>College</th>
									<th>Course</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>

								@foreach ($borrowers as $borrower)
								<tr>
									<td>
										{{ $borrower->first_name }} {{ $borrower->middle_name }} {{ $borrower->last_name }}
									</td>
									<td>
										{{ $borrower->id_number}}
									</td>
									<td>
										{{ $borrower->contact_number}}
									</td>
									<td>
										{{ $borrower->sex->description ?? ''}}
									</td>
									<td>
										{{ $borrower->position->description ?? ''}}
									</td>
									<td>
										{{ $borrower->college->description}}
									</td>
									<td>
										{{ $borrower->course->description ?? ''}}
									</td>

									<td class="text-center">
										<div class="btn-group" role="group">

											{{--<a class="btn btn-primary btn mx-1" href="{{ route('rp.index', $borrower->id) }}" target="_blank"
											title="Requester Profile">

											</a>--}}

											@can('view-borrowers-history')
											<a class="btn btn-primary btn mx-1" wire:click="borrowerProfile({{ $borrower->id }})" title="Requester Profile">
												<i class="fa-solid fa-clipboard-list"></i>
											</a>
											@endcan

											@can('view-borrowers-user-account')
											@if ($borrower->user_id == null)
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="createBorrowerAccount({{ $borrower->id }})" title="Add">
												<i class="fa-solid fa-user-plus"></i>
											</button>
											@endif

											@if($borrower->user_id != null)
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="createBorrowerAccount({{ $borrower->id }})" title="Add" disabled>
												<i class="fa-solid fa-user-check"></i>
											</button>
											@endif
											@endcan

											@can('view-borrowers-edit')
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editBorrower({{ $borrower->id }})" title="Edit">
												<i class='fa fa-pen-to-square'></i>
											</button>
											@endcan

											{{--<a class="btn btn-danger btn-sm mx-1" wire:click="deleteBorrower({{ $borrower->id }})" title="Delete">
											<i class="fa fa-trash"></i>
											</a>--}}
											<!-- Add Request button here -->
											{{--@can('view-borrowers-create-request')
											<button type="button" class="btn btn-success btn-sm mx-1" wire:click="createRequest({{ $borrower->id }})" title="Make Request">
												<i class="fa fa-plus"></i>
											</button>
											@endcan--}}
											
										</div>
									</td>

								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			{{-- Modal --}}

			<div wire.ignore.self class="modal fade" id="borrowerModal" tabindex="-1" role="dialog" aria-labelledby="borrowerModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
				<div class="modal-dialog modal-dialog-centered">
					<livewire:borrower.borrower-form />
				</div>
			</div>
			<div wire.ignore.self class="modal fade" id="borrowerAccountModal" tabindex="-1" role="dialog" aria-labelledby="borrowerAccountModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
				<div class="modal-dialog modal-dialog-centered">
					<livewire:borrower.borrower-account-form />
				</div>
			</div>
			<div wire.ignore.self class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
				<div class="modal-dialog modal-dialog-centered">
					<livewire:request.request-form />
				</div>
			</div>
			<div wire.ignore.self class="modal fade" id="borrowerProfile" tabindex="-1" role="dialog" aria-labelledby="borrowerProfile" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<livewire:borrower.borrower-profile />
				</div>
			</div>
			@section('custom_script')
			@include('layouts.scripts.borrower-scripts')
			@endsection

		</div>
		<!-- Pagination links -->
		{{ $borrowers->links() }}
	</div>
</div>