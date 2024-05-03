<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Secutity List</li>
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
									<h3>Security List</h3>
								</div>
							</div>
							<div class="col-auto text-end float-end ms-auto download-grp">
								<div class="top-nav-search table-search-blk">
									<form>
										<input class="form-control" name="search" placeholder="Search here" type="text"
											wire:model.debounce.500ms="search">
										<a class="btn"><img alt src="{{ asset('assets/img/icons/search-normal.svg') }}"></a>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr>
									<th style="width: 50%">Name</th>
									<th style="width: 30%">Signature</th>
									<th style="width: 20%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($securities as $security)
									<tr>
										<td>
											<div class="row">
												<div class="col-12">
													<span class="text-capitalize">{{ $security->Honorific->description ?? ''}} {{ $security->first_name }} {{ $security->last_name }}</span>
												</div>
												
											</div>
										</td>
										<td>
											@if (isset($security->esignature))
												<img src="{{ asset('/storage/' . $security->esignature) }}" alt="signature" style="width:50%">
											@else
												<span class="text-danger">No Signature</span>
											@endif
										</td>
										<!-- Edit and Delete buttons -->
										<td class="text-center">
											<div class="btn-group" role="group">
												<button class="btn btn-primary btn-sm mx-1" title="Edit" type="button"
													wire:click="editSecurity({{ $security->id }})">
													<i class="fa fa-pencil-square"></i>
												</button>
												{{-- @hasrole('admin')
													<button class="btn btn-danger btn-sm mx-1" title="Delete" wire:click="deleteDoctor({{ $doctor->id }})">
														<i class="fa fa-trash"></i>
													</button>
                                                    <a href="{{ route('revert.doctor', $doctor->id) }}" class="btn btn-warning btn-sm mx-1">
                                                        <i class="fa-solid fa-rotate-left"></i>
                                                    </a>
												@endhasrole --}}
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
<div aria-hidden="true" aria-labelledby="securityModal" class="modal fade" data-bs-backdrop="static"
	data-bs-keyboard="false" id="securityModal" role="dialog" tabindex="-1" wire.ignore.self>
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<livewire:security.security-form />
	</div>
</div>
@section('custom_script')
	@include('layouts.scripts.security-scripts')
@endsection
</div>

