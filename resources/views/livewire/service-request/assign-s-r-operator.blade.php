<div class="modal-content" id="modal-content-asro">
	<div class="modal-header">
		<h1 class="modal-title fs-5">

		</h1>
		<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	@if ($errors->any())
	<span class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</span>
	@endif
	@if(isset($errorMessage))
	<div class="alert alert-danger">
		{{ $errorMessage }}
	</div>
	@endif
	<form wire:submit.prevent="store" enctype="multipart/form-data">
		<div class="modal-body">
			<div class="row">

				<!-- <div class="col-md-12" wire:ignore>
					<div class="form-group local-forms">
						<label>Operator
						</label>
						<select class="form-control select" id="operator_id" wire:model="operator_id">
							<option value=null selected>Select operator</option>
							@foreach ($operators as $operator)
							<option value="{{ $operator->id }}">
								{{ $operator->first_name }}
							</option>
							@endforeach
						</select>
					</div>
				</div> -->

				<div class="col-md-6">
					<div class="form-group local-forms">
						<label>Set Date</label>
						<input class="form-control" type="date" wire:model="set_date" placeholder="mm/dd/yyyy" />
					</div>
				</div>
			</div>

			<div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
	</form>
	<script>
		document.addEventListener('livewire:load', function() {
			// Borrower Select2
			$('#operator_id').select2({
				dropdownParent: $('#modal-content-asro')
			});

			$('#operator_id').on('change', function(e) {
				let data = $(this).val();
				console.log(data);
				@this.set('operator_id', data);
			});
		});


		document.addEventListener('livewire:update', function() {
			// Refresh Select2 on Livewire update
			$('#operator_id').select2({
				dropdownParent: $('#modal-content-asro')
			});
		});
	</script>
</div>