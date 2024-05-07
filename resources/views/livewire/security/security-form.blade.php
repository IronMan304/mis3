<div class="modal-content">
	<div class="modal-header">
		<h1 class="modal-title fs-5">
			@if ($securityId)
			Edit Security
			@else
			Add Security
			@endif
		</h1>
		<button aria-label="Close" class="btn-close btn-sm" data-bs-dismiss="modal" type="button"></button>
	</div>
	@if ($errors->any())
	{{ implode('', $errors->all('<div>:message</div>')) }}
	@endif
	<form enctype="multipart/form-data" wire:submit.prevent="store">
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group local-forms">
								<label>Honorific
								</label>
								<select class="form-control select" wire:model="honorific_id">
									<option value="" selected>What do you want to be called</option>
									@foreach ($honorifics as $honorific)
									<option value="{{ $honorific->id }}">
										{{ $honorific->description }}
									</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group local-forms">
								<label>
									First Name
									<span class="login-danger">*</span>
								</label>
								<input class="form-control" placeholder type="text" wire:model="first_name" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group local-forms">
								<label>Middle Name</label>
								<input class="form-control" placeholder type="text" wire:model="middle_name" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group local-forms">
								<label>
									Last Name
									<span class="login-danger">*</span>
								</label>
								<input class="form-control" placeholder type="text" wire:model="last_name" />
							</div>
						</div>
					</div>
					<div class="row d-flex justify-content-center">
						<div class="col-md-6">
							<div class="form-group local-forms">
								<label for="esignature" class="form-label">Default file input example</label>
								<input class="form-control" type="file" id="esignature" wire:model='esignature'>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="submit">Save</button>
			</div>
		</div>
	</form>
</div>