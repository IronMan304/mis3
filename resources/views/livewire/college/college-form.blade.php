<div class="modal-content">
	<div class="modal-header">
		<h1 class="modal-title fs-5">
			@if ($collegeId)
				Edit College
			@else
				Add College
			@endif
		</h1>
		<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	@if ($errors->any())
		{{ implode('', $errors->all('<div>:message</div>')) }}
	@endif
	<form wire:submit.prevent="store" enctype="multipart/form-data">
		<div class="modal-body">
			<div class="row">
			<div class="col-md-12">
					<div class="form-group local-forms">
						<label>
							Code
							<span class="login-danger">*</span>
						</label>
						<input class="form-control" type="text" wire:model="code" placeholder="Ex: CAS" />
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group local-forms">
						<label>
							College
							<span class="login-danger">*</span>
						</label>
						<input class="form-control" type="text" wire:model="description" placeholder="College of Arts and Sciences" />
					</div>
				</div>

			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</form>
</div>
