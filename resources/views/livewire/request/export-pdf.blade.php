<!DOCTYPE html>
<html>

<head>
  <title>Equipment Request Report List</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 10px; /* Adjust font size as needed */
    }

    th,
    td {
      padding: 6px; /* Reduced padding */
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    /* Set page size and layout */
    @page {
      size: 8.5in 11in; /* Letter size (8.5 x 11 inches) */
      margin: 0; /* Remove default margins */
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
  <h1>Equipment Request Report</h1>
  <table class="table border-0 custom-table comman-table mb-0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Request Number</th>
        <th>Requester</th>
        {{--<th>Category:Type</th>
									<th>Tool</th>--}}
        <th>Requested Thru</th>



        <th>Date Needed</th>
        <th>Return Date</th>
        <th>Operator</th>
        <th>Category: Type: Equipment</th>
        <!-- <th>Equipment</th> -->
        <th>Status</th>
        <th>Date Requested</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($requests as $request)
      <tr>
        <td>{{ $request->id }}</td>
        <td>{{ $request->request_number}}</td>

        <td>
          {{ $request->borrower->first_name ?? '' }} {{ $request->borrower->middle_name ?? '' }} {{ $request->borrower->last_name ?? '' }}
        </td>
        <td>
          @if($request->borrower)
          @if($request->borrower->user_id == $request->user_id)
          {{ 'Online (Mobile app)' }} <br>
          {{ $request->borrower->user->email ?? ''}}
          @else
          {{ 'Offline (Face to Face)' }} <br>
          {{ $request->user->email ?? ''}}
          @endif
          @else
          {{ 'NULL' }}
          @endif
        </td>

        <td>
          {{ $request->date_needed ?? ''}}
        </td>
        <td>
          {{ $request->estimated_return_date ?? ''}}
        </td>

        <td>
          @if ($request->RequestOperatorKey->isNotEmpty())
          @foreach ($request->RequestOperatorKey as $request_operator_key)
          {{ $request_operator_key->operator->first_name ?? ''}} {{ $request_operator_key->operator->last_name ?? ''}} {{ $request_operator_key->status->description ?? ''}} {{--({{ $request_operator_key->toolStatus->description ?? ''}})--}}

          @if (!$loop->last)
          {{-- Add a Space or separator between department names --}}
          <br>
          @endif
          @endforeach
          @elseif ($request->option_id == 1)
          {{ 'TBA' }}
          @endif

          @if ($request->option_id == 2)
          {{ 'N/A' }}
          @endif
        </td>


        <!-- Equipment Category: Type -->
        <td>
          @if ($request->tool_keys)
          @foreach ($request->tool_keys as $toolKey)
          {{ $toolKey->tools->type->category->description }}: {{ $toolKey->tools->type->description }}
          <br>
          {{ $toolKey->tools->property_number ?? ''}}: {{ $toolKey->status->description ?? ''}} ({{ $toolKey->toolStatus->description ?? ''}})
          @if (!$loop->last)
          <br>
          @endif
          @endforeach
          @else
          No Tools Assigned
          @endif
        </td>

        <!-- Equipment -->
        {{--<td>
          @if ($request->tool_keys)
          @foreach ($request->tool_keys as $toolKey)
          {{ $toolKey->tools->property_number ?? ''}}: {{ $toolKey->status->description ?? ''}} ({{ $toolKey->toolStatus->description ?? ''}})

          @if (!$loop->last)
          {{-- Add a Space or separator between department names -
          <br>
          @endif
          @endforeach
          @else
          No Tools Assigned
          @endif
        </td>--}}

        <td>
          {{'Request'}}: {{ $request->status->description ?? ''}}
          <br>

          @if ($request->tool_keys)
          @php
          $shownSecurityIds = []; // Initialize an array to keep track of shown security IDs
          $hasContent = false;
          @endphp

          @foreach ($request->tool_keys as $toolKey)
          @foreach ($toolKey->rtts_keys as $rtts_key)
          {{-- Check if the security ID has already been shown --}}
          @if (!in_array($rtts_key->security->description, $shownSecurityIds))
          {{ $rtts_key->security->description }}: {{ $rtts_key->status->description ?? ''}}<br>



          @php
          $shownSecurityIds[] = $rtts_key->security->description;
          $hasContent = true;
          @endphp

          @endif
          @endforeach


          @endforeach

          @endif
        </td>

        <td>
          {{ $request->created_at }}
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>