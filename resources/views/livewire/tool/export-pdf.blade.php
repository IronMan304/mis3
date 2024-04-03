<!DOCTYPE html>
<html>

<head>
    <title>Tool List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Tool List</h1>
    <table>
        <thead>
            <tr>
                <th>Type</th>

                <th>Property Number</th>
                <th>Brand</th>
                <th>Applicability</th>
                <th>Security</th>
                <th>Source</th>
                <th>Status</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($tools as $tool)
            <tr>
            <td>{{ $tool->type->description ?? ''}}</td>
            <td>{{ $tool->property_number ?? ''}}</td>
                <td>{{ $tool->brand ?? ''}}</td>
                <td>
									@if ($tool->position_keys)
									@foreach ($tool->position_keys as $positionKey)
									- {{ $positionKey->positions->description ?? 'N/A' }}

									@if (!$loop->last)
									{{-- Add a Space or separator between department names --}}
									<br>
									@endif
									@endforeach

									@endif
									@if($tool->source_id == 4)
									{{ 'N/A'}}
									@endif
								</td>

								<td>
									@if ($tool->security_keys)
									@foreach ($tool->security_keys as $securityKey)
									- {{ $securityKey->securities->description ?? 'N/A'}}

									@if (!$loop->last)
									{{-- Add a Space or separator between department names --}}
									<br>
									@endif
									@endforeach
									@else
									No Tools Assigned
									@endif
									@if($tool->source_id == 4)
									{{ 'N/A'}}
									@endif
								</td>
                <td>{{ $tool->source->description ?? ''}} <br> {{ $tool->owner->first_name ?? '' }} {{ $tool->owner->last_name ?? ''}}</td>
                
                <td>{{ $tool->status->description ?? ''}}</td>
       
        
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>