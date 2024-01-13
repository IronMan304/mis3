<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Category List</li>
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
									<h3>Category List</h3>
									<div class="doctor-search-blk">
										<div class="add-group">
											<a wire:click="createCategory" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
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
									<td>Category</td>
									<td>Total</td>
									<th>In Stock</th>
									<th>In Use</th>
									<th>Damaged</th>
									<th>Lost</th>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($categories as $category)
								<tr>
									<td>
										{{ $category->description }}
									</td>
									<td>
										@php
										$totalToolsCount = 0;
										@endphp

										@foreach($category->types as $type)
										@php
										$totalToolsCount += $type->tools->count();
										@endphp
										@endforeach

										{{ $totalToolsCount }}
									</td>

									<td>
										@php
										$totalToolsCount = 0;
										@endphp

										@foreach($category->types as $type)
										@php
										$totalToolsCount += $type->tools->where('status_id', 1)->count();
										@endphp
										@endforeach

										{{ $totalToolsCount }}
									</td>
									<td>
										@php
										$totalToolsCount = 0;
										@endphp

										@foreach($category->types as $type)
										@php
										$totalToolsCount += $type->tools->where('status_id', 2)->count();
										@endphp
										@endforeach

										{{ $totalToolsCount }}
									</td>
									<td>
										@php
										$totalToolsCount = 0;
										@endphp

										@foreach($category->types as $type)
										@php
										$totalToolsCount += $type->tools->where('status_id', 4)->count();
										@endphp
										@endforeach

										{{ $totalToolsCount }}
									</td>
									<td>
										@php
										$totalToolsCount = 0;
										@endphp

										@foreach($category->types as $type)
										@php
										$totalToolsCount += $type->tools->where('status_id', 3)->count();
										@endphp
										@endforeach

										{{ $totalToolsCount }}
									</td>



									<td class="text-center">
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editCategory({{ $category->id }})" title="Edit">
												<i class='fa fa-pen-to-square'></i>
											</button>
											<!-- <a class="btn btn-danger btn-sm mx-1" wire:click="deleteCategory({{ $category->id }})" title="Delete">
												<i class="fa fa-trash"></i>
											</a>
											@if ($category->trashed())
											<button type="button" class="btn btn-success btn-sm mx-1" wire:click="recoverCategory({{ $category->id }})" title="Recover">
												<i class="fa fa-undo"></i>
											</button>
											@endif -->
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
</div>
{{-- Modal --}}

<div wire.ignore.self class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered">
		<livewire:category.category-form />
	</div>
</div>
@section('custom_script')
@include('layouts.scripts.category-scripts')
@endsection