<?php

namespace App\Http\Controllers\Api;

use App\Models\Tool;
use App\Models\Source;
use App\Models\Service;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ServiceRequestController extends Controller
{
    private $id, $borrower_id, $service_id, $tool_id, $staff_user_id, $status_id, $errorMessage, $source_id, $tool_status_id;

    public function index()
    {

        $tools = Tool::with(['source', 'category', 'type', 'status', 'security_keys', 'position_keys', 'owner'])->get();

        $sources = Source::all();
        //$equipments = Tool::all();
        $services = Service::all();

        // Combine tools and operators into a single array
        $data = [
            'tools' => $tools,
            'sources' => $sources,
            'services' => $services
        ];

        return response()->json($data);
    }
    public function id($id)
    {
        $this->id = $id;
        $serviceRequest = ServiceRequest::findOrFail($id);
        $this->borrower_id = $serviceRequest->borrower_id;
        $this->service_id = $serviceRequest->service_id;
        $this->tool_id = $serviceRequest->tool_id;
        $this->staff_user_id = $serviceRequest->staff_user_id;
        $this->status_id = $serviceRequest->status_id;
        $this->source_id = $serviceRequest->source_id;
        $this->tool_status_id = $serviceRequest->tool_status_id;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'borrower_id' => 'nullable',
            'service_id' => 'nullable',
            'tool_id' => 'nullable',
            'staff_user_id' => 'nullable',
            'status_id' => 'nullable',
            'source_id' => 'nullable',
            'tool_status_id' => 'nullable',
        ]);

        $tool = Tool::findOrFail($data['tool_id']);
        if ($tool->status_id == 1) {

            // Assign authenticated user's id to borrower_id if the user has the "requester" role
            if (auth()->user()->hasRole('requester') || auth()->user()->hasRole('student') || auth()->user()->hasRole('faculty') || auth()->user()->hasRole('guest')) {
                $data['borrower_id'] = Borrower::where('user_id', auth()->user()->id)->value('id');
            }


            $borrower = Borrower::findOrFail($data['borrower_id']);
            // Get the current year
            $currentYear = date('Y');

            $position = $borrower->position->description;
            $prefix = strtoupper(substr($position, 0, 1)); // Capitalize the first letter of the position

            // Get the last request number for the current year
            $lastRequestNumber = DB::table('service_requests')
                ->where('request_number', 'like', $prefix . 'SR' . $currentYear . '%')
                ->max('request_number');

            // Extract the number part and increment it
            if ($lastRequestNumber) {
                $lastNumber = (int)substr($lastRequestNumber, -4); // Extract the last 4 digits
                $newNumber = $lastNumber + 1;
            } else {
                // If no previous request number exists, start with 1
                $newNumber = 1;
            }

            // Pad the number with leading zeros if necessary
            $newNumberPadded = str_pad($newNumber, 4, '0', STR_PAD_LEFT);

            // Generate the new request number
            $data['request_number'] = $prefix . 'SR' . $currentYear . $newNumberPadded;

            Tool::where('id', $data['tool_id'])->update(['status_id' => 14]);
            $data['staff_user_id'] = auth()->user()->id;
            $data['status_id'] = 11; // Pending
            $data['tool_status_id'] = 14; // In Request

            $serviceRequest = ServiceRequest::create($data);

            return response()->json(['message' => 'Successfully Created', 'data' => $serviceRequest], Response::HTTP_CREATED);
        } else {
            return response()->json(['error' => 'You can only request equipment that are In stock'], Response::HTTP_BAD_REQUEST);
        }
    }
}
