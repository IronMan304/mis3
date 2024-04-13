<div class="modal-content" id="modal-content">

	<div class="modal-header">
		<h1 class="modal-title fs-5">

		</h1>
		<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	@if ($errors->any())
	{{ implode('', $errors->all('<div>:message</div>')) }}
	@endif

	<div class="modal-body">

		<div class="card-box">
			{{--<h4 class="card-title">Request Number: @foreach ($requests as $request)
				{{ $request->request_number ?? ''}}
				@endforeach</h4>--}}
				<ul class="nav nav-tabs nav-justified">
					<li class="nav-item"><a class="nav-link active" href="#basic-justified-tab1" data-bs-toggle="tab">Request Log</a></li>
					<li class="nav-item"><a class="nav-link" href="#basic-justified-tab2" data-bs-toggle="tab">Equipment Log</a></li>
					{{--<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Dropdown</a>
					<div class="dropdown-menu dropdown-menu-end">
						<a class="dropdown-item" href="#basic-justified-tab3" data-bs-toggle="tab">Dropdown 1</a>
						<a class="dropdown-item" href="#basic-justified-tab4" data-bs-toggle="tab">Dropdown 2</a>
					</div>
				</li>--}}
				</ul>
				<div class="tab-content">

					<div class="tab-pane show active" id="basic-justified-tab1">
						<div class="row">
							<div class="table-responsive">
								<table class="table border-0 custom-table comman-table mb-0">
									<thead>
										<tr>

											<!-- <th>Equipment Category: Type</th>
							<th>Equipment</th> -->
											<th>Request Number</th>
											<th>Date Requested</th>
											<th>Date Reviewed</th>
											<th>Date Approved</th>
											<th>Date Started</th>
											<th>Date Completed</th>
											<th>Date Rejected</th>
											<th>Date Cancelled</th>
											{{--<th>Action</th>--}}
										</tr>
									</thead>
									<tbody>
										@foreach ($requests as $request)
										<tr>

											<td>
												{{ $request->request_number ?? ''}}
											</td>

											<td>
												{{ $request->dt_requested ?? ''}}<br>
												{{ $request->dt_requested_user->first_name ?? ''}} {{ $request->dt_requested_user->middle_name ?? ''}} {{ $request->dt_requested_user->last_name ?? ''}}
												{{ isset($request->dt_requested_user->position->description) ? '(' . $request->dt_requested_user->position->description . ')' : '' }}<br>

											</td>

											<td>

												{{ $request->dt_reviewed ?? ''}}<br>
												{{ $request->dt_reviewed_user->first_name ?? ''}} {{ $request->dt_reviewed_user->middle_name ?? ''}} {{ $request->dt_reviewed_user->last_name ?? ''}}
												{{ isset($request->dt_reviewed_user->position->description) ? '(' . $request->dt_reviewed_user->position->description . ')' : '' }}<br>
											</td>

											<td>

												{{ $request->dt_approved ?? ''}}<br>
												{{ $request->dt_approved_user->first_name ?? ''}} {{ $request->dt_approved_user->middle_name ?? ''}} {{ $request->dt_approved_user->last_name ?? ''}}
												{{ isset($request->dt_approved_user->position->description) ? '(' . $request->dt_approved_user->position->description . ')' : '' }}<br>

												@php
												$latestUpdatedAtPerSecurityId = [];
												$shownSecurityIds = [];
												@endphp
												@foreach($request->tool_keys as $tool_key)
												@foreach($tool_key->rtts_keys as $rtts_key)
												@if($rtts_key->status_id == 10 && !in_array($rtts_key->security_id, $shownSecurityIds))
												@if(isset($latestUpdatedAtPerSecurityId[$rtts_key->security_id]))
												@if($rtts_key->updated_at > $latestUpdatedAtPerSecurityId[$rtts_key->security_id])
												{{ $rtts_key->updated_at ?? '' }}<br>
												@php
												$latestUpdatedAtPerSecurityId[$rtts_key->security_id] = $rtts_key->updated_at;
												@endphp
												@endif
												@else
												{{ $rtts_key->updated_at ?? '' }}<br>
												{{ $rtts_key->user->first_name ?? ''}} {{ $rtts_key->user->middle_name ?? ''}} {{ $rtts_key->user->last_name ?? ''}} {{ '(' . $rtts_key->user->position->description . ')' ?? ''}}<br>
												@php
												$latestUpdatedAtPerSecurityId[$rtts_key->security_id] = $rtts_key->updated_at;
												@endphp
												@endif
												@php
												$shownSecurityIds[] = $rtts_key->security_id;
												@endphp
												@endif
												@endforeach
												@endforeach

											</td>

											<td>

												{{ $request->dt_started ?? ''}}<br>
												{{ $request->dt_started_user->first_name ?? ''}} {{ $request->dt_started_user->middle_name ?? ''}} {{ $request->dt_started_user->last_name ?? ''}}
												{{ isset($request->dt_started_user->position->description) ? '(' . $request->dt_started_user->position->description . ')' : '' }}<br>

											</td>

											<td>

												{{ $request->dt_returned ?? ''}}<br>
												{{ $request->dt_returned_user->first_name ?? ''}} {{ $request->dt_returned_user->middle_name ?? ''}} {{ $request->dt_returned_user->last_name ?? ''}}
												{{ isset($request->dt_returned_user->position->description) ? '(' . $request->dt_returned_user->position->description . ')' : '' }}<br>

											</td>

											<td>

												{{ $request->dt_rejected ?? ''}}<br>
												{{ $request->dt_rejected_user->first_name ?? ''}} {{ $request->dt_rejected_user->middle_name ?? ''}} {{ $request->dt_rejected_user->last_name ?? ''}}
												{{ isset($request->dt_rejected_user->position->description) ? '(' . $request->dt_rejected_user->position->description . ')' : '' }}<br>

											</td>

											<td>

												{{ $request->dt_cancelled ?? ''}}<br>
												{{ $request->dt_cancelled_user->first_name ?? ''}} {{ $request->dt_cancelled_user->middle_name ?? ''}} {{ $request->dt_cancelled_user->last_name ?? ''}}
												{{ isset($request->dt_cancelled_user->position->description) ? '(' . $request->dt_cancelled_user->position->description . ')' : '' }}<br>

											</td>

										</tr>

										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="tab-pane" id="basic-justified-tab2">
						<div class="row">
							<div class="table-responsive">
								<table class="table border-0 custom-table comman-table mb-0">
									<thead>
										<tr>

											<th>Category: Type</th>
											<th>Equipment</th>
											<th>Date Requested</th>
											<th>Date Approved</th>
											<th>Date Started</th>
											<th>Date Returned</th>
											<th>Date Rejected</th>
											<th>Date Cancelled</th>
											{{--<th>Action</th>--}}
										</tr>
									</thead>
									<tbody>
										@forelse ($requests as $request)
										@if ($request->tool_keys)
										@foreach ($request->tool_keys as $toolKey)
										<tr>

											<!-- Equipment Category: Type -->
											<td>

												{{ $toolKey->tools->type->category->description }}: {{ $toolKey->tools->type->description }}

											</td>

											<!-- Equipment -->
											<td>

												{{ $toolKey->tools->brand ?? '' }}: {{ $toolKey->status->description ?? '' }} {{ isset($toolKey->toolStatus->description) ? '(' . $toolKey->toolStatus->description . ')' : '' }}

											</td>

											<td>

												{{ $toolKey->dt_requested ?? ''}}<br>
												{{ $toolKey->dt_requested_user->first_name ?? ''}}
												{{ isset($request->dt_requested_user->position->description) ? '(' . $request->dt_requested_user->position->description . ')' : '' }}<br>

											</td>

											<td>

												{{ $toolKey->dt_approved ?? ''}}<br>
												{{ $toolKey->dt_approved_user->first_name ?? ''}}
												{{ isset($request->dt_approved_user->position->description) ? '(' . $request->dt_approved_user->position->description . ')' : '' }}<br>

											</td>

											<td>

												{{ $toolKey->dt_started ?? ''}}<br>
												{{ $toolKey->dt_started_user->first_name ?? ''}}
												{{ isset($request->dt_started_user->position->description) ? '(' . $request->dt_started_user->position->description . ')' : '' }}<br>

											</td>

											<td>

												{{ $toolKey->dt_returned ?? ''}}<br>
												{{ $toolKey->dt_returned_user->first_name ?? ''}}
												{{ isset($request->dt_returned_user->position->description) ? '(' . $request->dt_returned_user->position->description . ')' : '' }}<br>

											</td>

											<td>

												{{ $toolKey->dt_rejected ?? ''}}<br>
												{{ $toolKey->dt_rejected_user->first_name ?? ''}}
												{{ isset($request->dt_rejected_user->position->description) ? '(' . $request->dt_rejected_user->position->description . ')' : '' }}<br>

											</td>

											<td>

												{{ $toolKey->dt_cancelled ?? ''}}<br>
												{{ $toolKey->dt_cancelled_user->first_name ?? ''}}
												{{ isset($request->dt_cancelled_user->position->description) ? '(' . $request->dt_cancelled_user->position->description . ')' : '' }}<br>

											</td>
										</tr>

										@endforeach
										@else
										<tr>
											<td colspan="4">No Tools Assigned</td>
										</tr>
										@endif
										@empty
										<tr>
											<td colspan="4">No Requests Found</td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>

		</div>

	</div>
	<div class="modal-footer">

	</div>

</div>