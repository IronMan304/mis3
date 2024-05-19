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

        .logo-container {
            /* display: flex;
            align-items: center; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-container img {
            margin-right: 10px;
            /* Optional: adds some space between the logos */
        }
    </style>
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            <div class="add-group">
                @if ($requestId)
                Request letter
                @else
                Add Sex
                @endif
                <!-- <button type="button" aria-label="Print"><i class="fa-solid fa-print"></i></button> -->
                @if($request)



                <a class="btn btn-primary btn-sm mx-1 bt-sty" title="Print Request Letter" href="{{ route('print.request', $request->id) }}" target="_blank">
                    <i class="fa-solid fa-print"></i>
                </a>
            </div>
            @endif
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
                            <p style="font-size: 12px;">A dynamic, competetive and globally responsive state university.</p>
                        </div>
                        <div class="mission">
                            <h5>Mission</h5>
                            <p style="font-size: 12px;">The University shall provide excellent instruction, relevant and responsive research and extension services, and quality-assured production through competent and highly motivated human capital.</p>
                        </div>
                        <div class="quality-policy">
                            <h5>Quality Policy</h5>
                            <p style="font-size: 12px;">NOrSU commits itself to the provision of quality instruction, research, extension services and production as well as compliance to applicable regulatory requirements and continual improvement of its management system.</p>
                        </div>
                        <div class="inner-box"> <a href=""><img src="assets/img/norsu.png" alt="Top Logo" style="width: 410px;"></a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-10">
                    <div class="logo-container">

                        <a href=""><img src="assets/img/top-logo.png" alt="Top Logo" style="width: 410px;"></a>
                        <a href=""><img src="assets/img/ncictso.png" alt="" style="width: 120px; margin-top: 9px;"></a>
                    </div>
                    <div class="content" style="font-size: 13px;">
                        {{--<p>{{ $request?->created_at?->format('m-d-Y') ?? '' }}</p>--}}

                        <div style="display: flex; justify-content: space-between;">
                            <p style="margin: 0;">
                                {{ $request?->created_at ? \Carbon\Carbon::parse($request->created_at)->format('F d, Y') : '' }}
                            </p>
                            <p style="margin: 0;">
                                <strong>{{ $request->request_number ?? '' }}</strong>
                            </p>
                        </div>





                        <br>
                        <br>

                        @if($request)
                        @if ($request->status_id == 10)

                        {{--@if($request->current_security_id == 6)--}}
                        @if (isset($president->security->esignature))
                        <div style="position: relative;">
                            <!-- Move the image above the name -->
                            <img src="{{ asset('/storage/' . $president->security->esignature) }}" alt="e_signature" style="width: 20%; position: absolute; top: -30px; left: -10px; z-index: 1;">
                        </div>
                        @endif
                        @endif
                        @endif
                        <p style="position: relative; z-index: 2;">
                            <!-- Adjust the position of the name -->
                            <strong>
                                <!-- Place the name here -->
                                {{ $president->security->Honorific->description ?? '' }}
                                {{ $president->first_name ?? '' }}
                                {{ $president->middle_name ?? '' }}
                                {{ $president->last_name ?? '' }}<br>
                                {{ $president->position->description ?? '' }}<br>
                                Negros Oriental State University<br>
                                Dumaguete City
                            </strong>
                        </p>


                        <br>

                        @if($request)
                        @if ($request->current_security_id == 6 || $request->status_id == 10)
                        {{--@if($request->current_security_id == 6)--}}
                        @if (isset($vp->security->esignature))
                        <div style="position: relative;">
                            <!-- Move the image above the name -->
                            <img src="{{ asset('/storage/' . $vp->security->esignature) }}" alt="e_signature" style="width: 20%; position: absolute; top: -30px; left: 40px; z-index: 1;">
                        </div>

                        @endif
                        @endif
                        @endif
                        <p style="position: relative; z-index: 2;">
                            Thru: <strong>{{ $vp->security->Honorific->description ?? '' }} {{ $vp->first_name ?? '' }} {{ $vp->middle_name ?? '' }} {{ $vp->last_name ?? '' }}<br></strong>
                            &emsp;&emsp;&emsp;{{$vp->position->description ?? ''}}<br>
                            &emsp;&emsp;&emsp;Negros Oriental State University
                        </p>


                        <p>
                            From: {{ $request->borrower->first_name ?? '' }} {{ $request->borrower->middle_name ?? '' }} {{ $request->borrower->last_name ?? '' }} ({{ $request->borrower->position->description ?? '' }})<br>
                            &emsp;&emsp;&emsp;{{ $request->borrower->college->description ?? '' }}<br>
                            &emsp;&emsp;&emsp;{{ $request->borrower->course->description ?? '' }}
                        </p>

                        <p>Dear {{ $president->security->Honorific->description ?? '' }} {{ $president->last_name ?? '' }} ,</p>

                        <p>Greetings!</p>

                        <p>I would like to request the borrowing of the following equipment:</p>

                        <!-- <table class="table border-0 custom-table comman-table mb-0"> -->
                        <!-- <table class="table border-0 custom-table comman-table mb-0" style="font-size: 1px"> -->
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Category: Type</th>
                                    <th>Brand</th>
                                    <th>Property Number</th>
                                    <th>Signature</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requests as $request)
                                @if ($request->tool_keys)
                                @foreach ($request->tool_keys as $toolKey)
                                <tr>
                                    <td style="font-size: 10px;">
                                        <!-- Equipment Category: Type -->
                                        {{ $toolKey->tools->type->category->description ?? ''}}: {{ $toolKey->tools->type->description ?? ''}}
                                    </td>
                                    <td style="font-size: 10px;">
                                        <!-- Equipment brand-->
                                        <div>
                                            {{ $toolKey->tools->brand ?? ''}} <br>
                                        </div>
                                    </td>
                                    <td style="font-size: 10px;">
                                        <!-- Equipment Property number-->
                                        <div>
                                            {{ $toolKey->tools->property_number ?? ''}}
                                        </div>
                                    </td>
                                    <td style="font-size: 10px;">
                                        @if($toolKey->status_id != 15 || $request->status_id != 15)
                                        @if ($toolKey->user)
                                        <div style="max-width: 100px;">
                                            <!-- Signature -->
                                            <img src="{{ asset('/storage/' . $toolKey->user->security->esignature) }}" alt="e_signature" style="max-width: 50%; height: 50;">
                                        </div>
                                        @else
                                        {{--{{ $toolKey->status->description ?? ''}}--}}
                                        {{ '' }}
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4">No Tools Assigned</td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="4">No Requests Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>



                        <br>

                        <p>
                            <strong>Borrowing Period:</strong><br>
                            Start Date: @foreach ($requests as $request) 
                            {{ $request?->date_needed ? \Carbon\Carbon::parse($request->date_needed)->format('F d, Y') : '' }}
                            @endforeach <br>
                            End Date: @foreach ($requests as $request) 
                            {{ $request?->estimated_return_date ? \Carbon\Carbon::parse($request->estimated_return_date)->format('F d, Y') : '' }}
                            @endforeach
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
                @can('hoo-letter-approval')
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="hOOAprroval({{ $request->id }})" title="Approval">
                    <i class="fa-solid fa-thumbs-up"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="hOOReject({{ $request->id }})" title="Reject">
                    <i class="fa-solid fa-thumbs-down"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                @endcan
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
                @can('vp-letter-approval')
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="vPAprroval({{ $request->id }})" title="Approval">
                    <i class="fa-solid fa-thumbs-up"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="vPReject({{ $request->id }})" title="Reject">
                    <i class="fa-solid fa-thumbs-down"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                @endcan
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
                @can('president-letter-approval')
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="pApproval({{ $request->id }})" title="Approval">
                    <i class="fa-solid fa-thumbs-up"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="pReject({{ $request->id }})" title="Reject">
                    <i class="fa-solid fa-thumbs-down"></i>{{ $rtts_key->security->description ?? ''}}
                </button>
                @endcan
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