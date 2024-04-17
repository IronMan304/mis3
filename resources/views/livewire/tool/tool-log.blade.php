<div class="modal-content" id="toolLog">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($toolId)
            Equipment Logs
            @else
            Add Sex
            @endif
        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close" wire:click="closeToolLog"></button>

    </div>
    @if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12">
                    <div class="card card-table show-entire">
                        <div class="table-responsive">
                            <table class="table border-0 custom-table comman-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>Requester</th>
                                        <th>Request Number (Request Status)</th>
                                        <th>Equipment Property Number (Equipment Status)</th>
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
                                            {{ isset($toolRequest->requests->status->description) ? '(' . $toolRequest->requests->status->description . ')' : '' }}
                                        </td>
                                        <td>
                                            {{ $toolRequest->tools->property_number ?? '' }}: {{ $toolRequest->status->description ?? '' }} {{ isset($toolRequest->toolStatus->description) ? '(' . $toolRequest->toolStatus->description . ')' : '' }}

                                        </td>
                                        {{--<td>

                                            {{ $toolRequest->tools->brand ?? '' }}: {{ $toolRequest->status->description ?? '' }} {{ isset($toolRequest->toolStatus->description) ? '(' . $toolRequest->toolStatus->description . ')' : '' }}


                                        </td>--}}


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{ $toolRequests->links() }}
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
            </div>
    </form>
</div>