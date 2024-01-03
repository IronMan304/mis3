<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($borrowerId)
            Edit Borrower
            @else
            Add Borrower
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
                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>
                            Id Number
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="id_number" placeholder />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>
                            First name
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="first_name" placeholder />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>
                            Middle name
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="middle_name" placeholder />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>
                            Last name
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="last_name" placeholder />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>
                            Contact Number
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="contact_number" placeholder />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Gender
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select" wire:model="sex_id">
                            @foreach ($sexes as $sex)
                            <option value="{{ $sex->id }}">
                                {{ $sex->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>College
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select" wire:model="college_id">
                        <option value=""  selected>Select a College</option>
                            @foreach ($colleges as $college)
                            <option value="{{ $college->id }}">
                                {{ $college->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group local-forms">
                        <label>Course
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select" wire:model="course_id">
                        <option value=""  selected>Select a Course</option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}">
                                {{ $course->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
