<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
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

</head>


<body onload="window.print()">

  <div class="row">
    <div class="col-2">
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


    <div class="col-9">
      <div class="content" style="font-size: 13px;">
        {{--<p>{{ $request?->created_at?->format('m-d-Y') ?? '' }}</p>--}}
        <p>{{ $request?->created_at ? \Carbon\Carbon::parse($request->created_at)->format('F d, Y') : '' }}</p>
        &emsp; &emsp; &emsp;<p>{{ $request->request_number ?? ''  }}</p>

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
                @if($toolKey->status_id != 15 || $request->status_id == 15)
                @if ($toolKey->user)
                <div style="max-width: 100px;">
                  <!-- Signature -->
                  <img src="{{ asset('/storage/' . $toolKey->user->security->esignature) }}" alt="e_signature" style="max-width: 50%; height: 50;">
                </div>
                @else
                {{ $toolKey->status->description ?? ''}}
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

</body>

</html>