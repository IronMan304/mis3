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
		<div class="row">
			<div class="table-responsive">
				<table class="table border-0 custom-table comman-table mb-0">
					<thead>
						<tr>

							<th>Equipment Category:Type</th>
							<th>Equipment</th>
							<th>Date Requested</th>
							<th>Date Returned</th>
							{{--<th>Action</th>--}}
						</tr>
					</thead>
					<tbody>
						@foreach ($requests as $request)
						<tr>


							<td>
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
								{{-- Add a Space or separator between department names --}}
								<br>
								@endif
								@endforeach
								@else
								No Tools Assigned
								@endif
							</td>

							{{--<td>
								{{ $request->created_at->format('m-d-Y H:i A')}}
							</td>--}}

							<td>{{ $request->created_at->setTimezone('Asia/Manila')->format('m-d-Y H:i:s') }}<br>
								({{ $request->user->position->description ?? 'N/A' }}) {{ $request->user->first_name ?? '' }} {{ $request->user->last_name ?? '' }}
							</td>

							<td>
								@if ($request->tool_keys)
								@foreach ($request->tool_keys as $toolKey)
								@if($toolKey->tool_status_id == 7)
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

							{{--<td>
									@if($request->status_id == 11)
											<button class="btn btn-success btn-sm mx-1" type="button" wire:click="approveRequest({{ $request->id }})">
							<i class="fa-solid fa-thumbs-up"></i>
							</button>
							@endif
							</td>--}}










						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal-footer">

	</div>

</div>