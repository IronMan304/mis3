<div class="modal-content">
    <style>
        .sidebar-box {
            border: 2px solid #1e6091;
            /* Dark blue border */
            background-color: #eaf6ff;
            /* Light blue background */
            padding: 5px;
            /* Padding inside the border */
            padding-top: 20px;
            border-radius: 5px;
            /* Rounded corners */
        }

        .inner-box {
            border: 1px solid #1e6091;
            /* Dark blue border for inner box */
            background-color: #ffffff;
            /* White background for inner box */
            padding: 10px;
            /* Padding inside the inner box */
            border-radius: 5px;
            /* Rounded corners for inner box */
            height: 100px;
            /* Set height of the inner box */
            overflow: auto;
            /* Add scrollbar if content overflows */
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($requestId)
            Request letter
            @else
            Add Sex
            @endif
            <button type="button" aria-label="Print"><i class="fa-solid fa-print"></i></button>
            <a class="btn btn-primary btn-sm mx-1" title="Print Request Letter" href="{{ route('print.request', 170) }}" target="_blank">
                <i class="fa-solid fa-print"></i>
            </a>
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


                <div class="col-lg-2">
                    <div class="sidebar1 text-center sidebar-box">
                        <div class="vision">
                            <h5>Vision</h5>
                            <p style="font-size: 10px;">A dynamic, competetive and globally responsive state university.</p>
                        </div>
                        <div class="mission">
                            <h5>Mission</h5>
                            <p style="font-size: 10px;">The University shall provide excellent instruction, relevant and responsive research and extension services, and quality-assured production through competent and highly motivated human capital.</p>
                        </div>
                        <div class="quality-policy">
                            <h5>Quality Policy</h5>
                            <p style="font-size: 10px;">NOrSU commits itself to the provision of quality instruction, research, extension services and production as well as compliance to applicable regulatory requirements and continual improvement of its management system.</p>
                        </div>
                        <div class="inner-box">
                        </div>
                    </div>
                </div>


                <div class="col-lg-10">
                    <div class="content" style="font-size: 13px;">
                        {{--<p>{{ $request?->created_at?->format('m-d-Y') ?? '' }}</p>--}}
                        <p>{{ $request?->created_at ? \Carbon\Carbon::parse($request->created_at)->format('F d, Y') : '' }}</p>



                        <p>
                            <strong>{{ $president->honorific->description ?? '' }} {{ $president->first_name ?? '' }} {{ $president->middle_name ?? '' }} {{ $president->last_name ?? '' }}<br>
                                {{$president->position->description ?? ''}}</strong><br>
                            Negros Oriental State University<br>
                            Dumaguete City
                        </p>


                        <p>
                            Thru: <strong>{{ $vp->honorific->description ?? '' }} {{ $vp->first_name ?? '' }} {{ $vp->middle_name ?? '' }} {{ $vp->last_name ?? '' }}<br></strong>
                            &emsp;&emsp;&emsp;{{$vp->position->description ?? ''}}<br>
                            &emsp;&emsp;&emsp;Negros Oriental State University
                        </p>


                        <p>
                            From: {{ $request->borrower->first_name ?? '' }} {{ $request->borrower->middle_name ?? '' }} {{ $request->borrower->last_name ?? '' }} ({{ $request->borrower->position->description ?? '' }})<br>
                            &emsp;&emsp;&emsp;{{ $request->borrower->college->description ?? '' }}<br>
                            &emsp;&emsp;&emsp;{{ $request->borrower->course->description ?? '' }}
                        </p>

                        <p>Dear {{ $president->honorific->description ?? '' }} {{ $president->last_name ?? '' }} ,</p>

                        <p>Greetings!</p>

                        <p>I would like to request the borrowing of the following equipment:</p>

                        <table class="table border-0 custom-table comman-table mb-0">
                            <thead>
                                <tr>
                                    <th>Category: Type</th>
                                    <th>Equipment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $request)
                                <tr>
                                    <!-- Equipment Category: Type -->
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

                                    <!-- Equipment -->
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

                        <p>
                            <strong>Borrowing Period:</strong><br>
                            Start Date: @foreach ($requests as $request) {{ $request->date_needed ?? '' }} @endforeach <br>
                            End Date: @foreach ($requests as $request) {{ $request->estimated_return_date ?? '' }} @endforeach
                        </p>

                        <p><strong>Purpose of Borrowing:</strong> @foreach ($requests as $request) {{ $request->purpose ?? '' }} @endforeach</p>



                        <p>Thank you for your assistance.</p>

                        <p>Sincerely,<br>
                            {{ $request->borrower->first_name ?? '' }} {{ $request->borrower->middle_name ?? '' }} {{ $request->borrower->last_name ?? '' }} ({{ $request->borrower->position->description ?? '' }})<br>
                            {{ $request->borrower->college->description ?? '' }}<br>
                            {{ $request->borrower->course->description ?? '' }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div>
                @if ($request && $request->tool_keys)
                @php
                $shownSecurityIds = []; // Initialize an array to keep track of shown security IDs

                @endphp

                @if($request->status_id == 16)
                @foreach ($request->tool_keys as $toolKey)
                @foreach ($toolKey->rtts_keys as $rtts_key)

                {{-- Check if the security ID has already been shown --}}
                @if (!in_array($rtts_key->security->description, $shownSecurityIds))
                {{-- Check if the status is null and security ID meets the condition --}}
                @if($rtts_key->status_id == 11 && ($rtts_key->security_id == 3 || $rtts_key->security_id == 5 || $rtts_key->security_id == 6))

                @if($rtts_key->status_id == 11 && $rtts_key->security_id == 3 && $request->current_security_id == 3)
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="hOOAprroval({{ $request->id }})" title="Approval">
                    <i class="fa-solid fa-thumbs-up"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="hOOReject({{ $request->id }})" title="Reject">
                    <i class="fa-solid fa-thumbs-down"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                @endif

                @php
                $shownSecurityIds[] = $rtts_key->security->description;
                @endphp

                @endif
                @endif

                @endforeach
                @endforeach
                @endif
                @endif
            </div>
            <div>
                @if ($request && $request->tool_keys)
                @php
                $shownSecurityIds = []; // Initialize an array to keep track of shown security IDs

                @endphp


                @foreach ($request->tool_keys as $toolKey)
                @foreach ($toolKey->rtts_keys as $rtts_key)

                {{-- Check if the security ID has already been shown --}}
                @if (!in_array($rtts_key->security->description, $shownSecurityIds))
                {{-- Check if the status is null and security ID meets the condition --}}
                @if($rtts_key->status_id == 11 && ($rtts_key->security_id == 3 || $rtts_key->security_id == 5 || $rtts_key->security_id == 6))

                @if($rtts_key->status_id == 11 && $rtts_key->security_id == 5 && $request->current_security_id == 5)
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="vPAprroval({{ $request->id }})" title="Approval">
                    <i class="fa-solid fa-thumbs-up"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="vPReject({{ $request->id }})" title="Reject">
                    <i class="fa-solid fa-thumbs-down"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                @endif

                @php
                $shownSecurityIds[] = $rtts_key->security->description;
                @endphp

                @endif
                @endif

                @endforeach
                @endforeach

                @endif
            </div>

            <div>
                @if ($request && $request->tool_keys)
                @php
                $shownSecurityIds = []; // Initialize an array to keep track of shown security IDs

                @endphp

                @if($request->status_id == 16)
                @foreach ($request->tool_keys as $toolKey)
                @foreach ($toolKey->rtts_keys as $rtts_key)

                {{-- Check if the security ID has already been shown --}}
                @if (!in_array($rtts_key->security->description, $shownSecurityIds))
                {{-- Check if the status is null and security ID meets the condition --}}
                @if($rtts_key->status_id == 11 && ($rtts_key->security_id == 3 || $rtts_key->security_id == 5 || $rtts_key->security_id == 6))


                @if($rtts_key->status_id == 11 && $rtts_key->security_id == 6 && $request->current_security_id == 6)
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="pApproval({{ $request->id }})" title="Approval">
                    <i class="fa-solid fa-thumbs-up"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="pReject({{ $request->id }})" title="Reject">
                    <i class="fa-solid fa-thumbs-down"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                @endif


                @php
                $shownSecurityIds[] = $rtts_key->security->description;
                @endphp

                @endif
                @endif

                @endforeach
                @endforeach
                @endif
                @endif
            </div>




        </div>
    </form>
</div>