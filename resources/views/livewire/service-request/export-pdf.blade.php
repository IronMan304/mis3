<!DOCTYPE html>
<html>

<head>
  <title>Service Request Report List</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    h1 {
      text-align: center;
      margin-top: 20px;
    }

    .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f2f2f2;
            padding: 10px;
             position: relative;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1;
        }

    .logo-container img {
      width: 200px;
      margin: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 10px;
      /* Adjust font size as needed */
    }

    th,
    td {
      padding: 6px;
      /* Reduced padding */
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    /* Set page size and layout */
    @page {
      size: 8.5in 11in;
      /* Letter size (8.5 x 11 inches) */
      margin: 0;
      /* Remove default margins */
    }

    /* Ensure table fits within page */
    table {
      page-break-inside: auto;
    }

    tbody {
      page-break-inside: avoid;
    }

    tr {
      page-break-inside: avoid;
      page-break-after: auto;
    }
  </style>
</head>

<body>
<div class="logo-container">
    <a href="#"><img src="assets/img/top-logo.png" alt="NORSU Logo" style="width: 410px; margin-left: 140px; margin-bottom: -5px;"></a>
    <a href="#"><img src="assets/img/ncictso.png" alt="CICTSO Logo" style="width: 120px; margin-bottom: -18px; margin-left: -20px; height: 120px;"></a>
  </div>
  <h1>Service Request Report</h1>
  <table class="table border-0 custom-table comman-table mb-0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Request Number</th>
        <th>Requester</th>
        <th>Requested Thru</th>
        <th>Source</th>

        <th>Operator</th>
        <th>Category: Type</th>
        <th>Equipment</th>
        <th>Date Scheduled</th>
        <th>Status</th>
        <th>Date Requested</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($requests as $service_request)
      <tr>
        <td>{{ $service_request->id }}</td>
        <td>{{ $service_request->request_number }}</td>
        <td>
          {{ $service_request->borrower->first_name ?? '' }} {{ $service_request->borrower->middle_name ?? '' }} {{ $service_request->borrower->last_name ?? '' }}
        </td>
        <td>
          @if($service_request->borrower)
          @if($service_request->borrower->user_id == $service_request->user_id)
          {{ 'Online (Mobile app)' }} <br>
          {{ $service_request->borrower->user->email ?? ''}}
          @else
          {{ 'Offline (Face to Face)' }} <br>
          {{ $service_request->user->email ?? ''}}
          @endif
          @else
          {{ 'NULL' }}
          @endif
        </td>
        <td>
          {{ $service_request->source->description ?? ''}}
        </td>

        {{-- <td>
          {{$service_request->service->description ?? ''}}
        </td>--}}

        {{--<td>
                                        {{ $service_request->operator->first_name ?? 'TBA'}}
        </td>--}}

        <td>
          {{ $service_request->Technician->first_name ?? 'TBA'}}
        </td>

        <td>
          {{ $service_request->tool->type->category->description ?? ''}}: {{ $service_request->tool->type->description ?? ''}}
        </td>
        <td>
          {{ $service_request->tool->property_number ?? ''}}
        </td>

        <td>
          {{ $service_request->set_date ?? ''}}
        </td>
        <td>
          {{ $service_request->status->description ?? ''}}
        </td>

        <td>
          {{ $service_request->created_at }}
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>