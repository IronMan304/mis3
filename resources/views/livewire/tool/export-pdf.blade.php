<!DOCTYPE html>
<html>

<head>
    <title>Tool List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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

        .content {
            margin-top: calc(140px + 20px);
            /* Adjust the value as needed */
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

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        @media print {
            .logo-container {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1;
                background-color: #fff;
            }

            .content {
                margin-top: calc(120px + 20px);
                /* Adjust the value as needed */
            }


            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            thead {
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }
        }
    </style>
</head>

<body>
    <div class="logo-container">
        <a href="#"><img src="assets/img/top-logo.png" alt="NORSU Logo" style="width: 410px; margin-left: 75px;"></a>
        <a href="#"><img src="assets/img/ncictso.png" alt="CICTSO Logo" style="width: 120px; margin-bottom: -18px; margin-left: -20px; height: 120px;"></a>
    </div>
    <div class="content">
        <h1>Equipment List</h1>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Property Number</th>
                    <th>Brand</th>
                    <th>Part</th>
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
                        @if ($tool->Parts)
                        @foreach ($tool->Parts as $part)
                        - {{ $part->name ?? 'N/A' }}

                        @if (!$loop->last)
                        {{-- Add a Space or separator between department names --}}
                        <br>
                        @endif
                        @endforeach

                        @endif
                    </td>
                    <td>
                        @if ($tool->position_keys)
                        @foreach ($tool->position_keys as $positionKey)
                        - {{ $positionKey->positions->description ?? 'N/A' }}
                        @if (!$loop->last)
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
                    <td>{{ $tool->source->description ?? ''}}
                        <br>
                        {{ $tool->owner->first_name ?? '' }} {{ $tool->owner->last_name ?? ''}}
                    </td>
                    <td>{{ $tool->status->description ?? ''}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>