<div class="modal-content">
	<div class="modal-header">
		<h1 class="modal-title fs-5">
			@if ($sexId)
				Edit Sex
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
			<div class="row">
				<div class="col-md-12">
					<div class="form-group local-forms">
						<label>
							Sex
							<span class="login-danger">*</span>
						</label>
						<input class="form-control" type="text" wire:model="description" placeholder />
					</div>
				</div>

				<div>

    <div wire:ignore>
        <select wire:model="companies" multiple id="testdropdown" class="w-full">
            <option value="Apple">Apple</option>
            <option value="Samsung">Samsung</option>
            <option value="HTC">HTC</option>
            <option value="One Plus">One Plus</option>
            <option value="Nokia">Nokia</option>
        </select>
    </div>

    <button wire:click="save">Save</button>

    @script()
        <script>
            $(document).ready(function() {
                $('#testdropdown').select2();
                $('#testdropdown').on('change', function() {
                    let data = $(this).val();
                    console.log(data);
                    // $wire.set('companies', data, false);
                    // $wire.companies = data;
                    @this.companies = data;
                });
            });
        </script>
    @endscript
</div>

			</div>

		</div>


		
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</form>
</div>
