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

                        <div class="card-box">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="nav-item"><a class="nav-link active" href="#basic-justified-tab1" data-bs-toggle="tab" >Equipment Request</a></li>
                                <li class="nav-item"><a class="nav-link" href="#basic-justified-tab2" data-bs-toggle="tab" >Service Request</a></li>
                                {{--<li class="nav-item dropdown">
                                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#basic-justified-tab3" data-bs-toggle="tab">Dropdown 1</a>
                                        <a class="dropdown-item" href="#basic-justified-tab4" data-bs-toggle="tab">Dropdown 2</a>
                                    </div>
                                </li>--}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="basic-justified-tab1">
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

                                    {{ $toolRequests->links() }}

                                </div>
                                <div class="tab-pane" id="basic-justified-tab2">
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
                                                @foreach ($serviceRequests as $serviceRequest)
                                                <tr>
                                                    <td>
                                                        {{ $serviceRequest->borrower->first_name ?? ''}}
                                                    </td>
                                                    <td>
                                                        {{ $serviceRequest->request_number ?? ''}}
                                                        {{ isset($serviceRequest->status->description) ? '(' . $serviceRequest->status->description . ')' : '' }}
                                                    </td>
                                                    <td>
                                                        {{ $serviceRequest->tool->property_number ?? '' }}: {{ $serviceRequest->status->description ?? '' }} {{ isset($serviceRequest->ToolStatus->description) ? '(' . $serviceRequest->ToolStatus->description . ')' : '' }}

                                                    </td>
                                                    {{--<td>

                                            {{ $serviceRequest->tools->brand ?? '' }}: {{ $serviceRequest->status->description ?? '' }} {{ isset($serviceRequest->toolStatus->description) ? '(' . $serviceRequest->toolStatus->description . ')' : '' }}


                                                    </td>--}}


                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{--@if($serviceRequests)
                                    {{ $serviceRequests->links() }}
                                    @endif--}}
                                    {{ $serviceRequests->links() }}
                                </div>
                                {{--<div class="tab-pane" id="basic-justified-tab3">
                                    Tab content 3
                                </div>
                                <div class="tab-pane" id="basic-justified-tab4">
                                    Tab content 4
                                </div>--}}
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->




            </div>
    </form>

</div>