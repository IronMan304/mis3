<!DOCTYPE html>
<html>

<head>
  <style>
    @page {
      size: letter portrait;
      margin: 1cm;
    }

    body {
      font-size: 12px;
    }

    .sidebar-box {
      border: 2px solid #1e6091;
      background-color: #eaf6ff;
      padding: 15px;
      border-radius: 5px;
      width: 30%;
    }

    .inner-box {
      border: 1px solid #1e6091;
      background-color: #ffffff;
      padding: 8px;
      border-radius: 5px;
      height: 80px;
      overflow: auto;
      margin-top: 5px;
    }

    .content {
      font-size: 12px;
    }

    .vision,
    .mission,
    .quality-policy {
      text-align: center;
      margin-bottom: 15px;
    }

    .vision h5,
    .mission h5,
    .quality-policy h5 {
      margin-bottom: 5px;
    }

    .row {
      display: flex;
    }

    .col-lg-2 {
      flex: 0 0 auto;
      width: 30%;
    }

    .col-lg-10 {
      flex: 0 0 auto;
      width: 70%;
    }
  </style>
</head>


<body onload="window.print()">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2">
        <div class="text-center sidebar-box">
          <div class="vision">
            <h5>Vision</h5>
            <p style="font-size: 10px;">A dynamic, competitive and globally responsive state university.</p>
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
        <div class="content">
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
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
