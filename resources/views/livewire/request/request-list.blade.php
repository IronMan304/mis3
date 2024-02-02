<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">Request List</li>
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
									<h3>Request List</h3>
									<div class="doctor-search-blk">
										<div class="add-group">
											<a wire:click="createRequest" class="btn btn-primary ms-2"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt>
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
									<th>ID</th>
									<th>Requester</th>
									{{--<th>Category:Type</th>
									<th>Tool</th>--}}
									<th>Operator</th>
									<th>Event</th>
									<th>Status</th>
									<th>Date Requested</th>
									<th>Date Returned</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($requests as $request)
								<tr>
									<td>{{ $request->id }}</td>
									<td>
										{{ $request->borrower->first_name ?? '' }}
									</td>
									<td></td>
									<td></td>


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

									<td>
										{{ $request->status->description}}
									</td>

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

									<td>{{ $request->updated_at->setTimezone('Asia/Manila')->format('m-d-Y H:i:s') }}<br>
										({{ $request->user->position->description ?? 'N/A' }}) {{ $request->user->first_name ?? '' }} {{ $request->user->last_name ?? '' }}
									</td>

									<td>
										@if ($request->tool_keys)
										@foreach ($request->tool_keys as $toolKey)
										@if($toolKey->created_at != $toolKey->updated_at)
										{{ $toolKey->returned_at }}<br>
										({{ $toolKey->user->position->description ?? '' }}) {{ $toolKey->user->first_name ?? '' }} {{ $toolKey->user->last_name ?? '' }}
										@if (!$loop->last)
										<p>-------------------</p>
										@endif
										@endif
										@endforeach
										@else
										No Tools Assigned
										@endif
									</td>



									<td class="text-center">
										<div class="btn-group" role="group">
											{{--<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="editRequest({{ $request->id }})" title="Edit">
											<i class='fa fa-pen-to-square'></i>
											</button>--}}
											@if ($request->tool_keys)
											@php $returnButtonShown = false; @endphp
											{{--@if($request->status_id == 11)
											<button class="btn btn-success btn-sm mx-1" type="button" wire:click="approveRequest({{ $request->id }})">
												<i class="fa-solid fa-thumbs-up"></i>
											</button>
											@endif--}}

											@if($request->status_id != 16)
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="approvalRequest({{ $request->id }})" title="Approval" style="background: linear-gradient(to right, red 50%, blue 50%);">
												<i class="fa-solid fa-arrow-right-arrow-left"></i>
											</button>
											@endif

											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="viewRequestTool({{ $request->id }})" title="View Tool">
												<i class="fa-solid fa-toolbox"></i>
											</button>
											@foreach ($request->tool_keys as $toolKey)
											@if($toolKey->status_id == 6 && !$returnButtonShown)
											@php $returnButtonShown = true; @endphp
											<button type="button" class="btn btn-primary btn-sm mx-1" wire:click="returnRequest({{ $request->id }})" title="Return" style="background: linear-gradient(to right, red 50%, blue 50%);">
												<i class="fa-solid fa-arrow-right-arrow-left"></i>
											</button>

											@endif
											@endforeach
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

	<div wire.ignore.self class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:request.request-form />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="returnModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:request.return-form />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="requestToolViewModal" tabindex="-1" role="dialog" aria-labelledby="requestToolViewModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:request.request-tool-view />
		</div>
	</div>

	<div wire.ignore.self class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<livewire:request.approval-form />
		</div>
	</div>
</div>

@section('custom_script')
@include('layouts.scripts.request-scripts')
@endsection