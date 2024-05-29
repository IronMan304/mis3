<div class="modal-content" id="modal-content">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <div class="modal-header">

        <h1 class="modal-title fs-5">

        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    @if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">

                <div class="col-md-12" wire:ignore>
                    <select id="description" class="form-control select">
                        <option value="Apple">Apple</option>
                        <option value="Samsung">Samsung</option>
                        <option value="HTC">HTC</option>
                        <option value="One Plus">One Plus</option>
                        <option value="Nokia">Nokia</option>
                    </select>
                </div>

                <div class="row mb-2" wire:key="button-group">
                    <div class="col-md-12">
                        <button class="btn btn-info" wire:click.prevent="addSubscription" id="addSubscription"><i class="fa-solid fa-plus"></i> Add
                            Subscription</button>
                        <button class="btn btn-info" wire:click.prevent="addSubscription" id="  " hidden><i class="fa-solid fa-plus"></i> Add
                            Subscription</button>

                    </div>
                </div>
                <div class="row p-1">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th class="col">SUBSCRIPTION</th>
                            <th class="col">DESCRIPTION</th>
                            <th class="col">PRICE</th>
                            <th class="col">PERIOD TYPE</th>
                            <th class="col-md-2"></th>
                        </thead>
                        <tbody>
                            @foreach ($subscriptionItems as $subscriptionIndex => $subscription)
                                <tr>
                                    <td>
                                        <select wire:model="subscriptionItems.{{ $subscriptionIndex }}.subscription_id" name="subscriptionItems[{{ $subscriptionIndex }}][subscription_id]" class="form-select selectSubProduct" wire:change="setSubscription($event.target.value)">
                                            <option selected="" value="">Choose...</option>
                                            @foreach ($subscriptions as $subs)
                                                <option value="{{ $subs->id }}">
                                                    {{ $subs->subs_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" wire:model="subscriptionItems.{{ $subscriptionIndex }}.description" name="subscriptionItems[{{ $subscriptionIndex }}][description]" class="form-control" readonly>
                                    </td>

                                    <td>
                                        <input type="text" wire:model="subscriptionItems.{{ $subscriptionIndex }}.price" name="subscriptionItems[{{ $subscriptionIndex }}][price]" class="form-control" readonly>
                                    </td>

                                    <td>
                                        <input type="text" wire:model="subscriptionItems.{{ $subscriptionIndex }}.period_type" name="subscriptionItems[{{ $subscriptionIndex }}][period_type]" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <a class="btn btn-info delete-header m-1 btn-sm  justify-content-center " title="Delete Item" wire:click="deleteSubscription({{ $subscriptionIndex }})"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>

        </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
document.addEventListener('livewire:load', function () {
    $('#description').select2({
        dropdownParent: $('#modal-content')
    });

    $('#description').on('change', function (e) {
        let data = $(this).val();
        console.log(data);
        @this.set('description', data);
    });
});

document.addEventListener('livewire:update', function () {
    $('#description').select2({
        dropdownParent: $('#modal-content')
    });
});
</script>


</div>