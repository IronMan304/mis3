<div class="modal-content">
	<div class="modal-header">
		<h1 class="modal-title fs-5">
			@if ($toolId)
			View Tool Information
			@else
			Add Sex
			@endif
		</h1>
		<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	@if ($errors->any())
	{{ implode('', $errors->all('<div>:message</div>')) }}
	@endif
	<form wire:submit.prevent="store" enctype="multipart/form-data">
		<div class="modal-body">
			<table class="table border-0 custom-table comman-table datatable mb-0">
				<thead>
					<tr>
						<td>Requester</td>
						<td>RN</td>
						<td>Tool</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($toolRequests as $toolRequest)
					<tr>
						<td>
							{{ $toolRequest->requests->borrower->first_name ?? ''}}
						</td>
						<td>
							{{ $toolRequest->requests->request_number ?? ''}}
						</td>
						<td>
							{{ $toolRequest->tools->property_number ?? '' }}
						</td>
						<td>

							{{ $toolRequest->tools->brand ?? '' }}: {{ $toolRequest->status->description ?? '' }} {{ isset($toolRequest->toolStatus->description) ? '(' . $toolRequest->toolStatus->description . ')' : '' }}


						</td>


					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	</form>
</div>