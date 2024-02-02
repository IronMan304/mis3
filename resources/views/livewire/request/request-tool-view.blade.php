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
						<table class="table border-0 custom-table comman-table datatable mb-0">
							<thead>
								<tr>
								
									<th>Category:Type</th>
									<th>Tool</th>
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