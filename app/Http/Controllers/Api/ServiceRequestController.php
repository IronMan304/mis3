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
use App\Http\Controllers\Controller;

class ServiceRequestController extends Controller
{
    private $id, $borrower_id, $service_id, $tool_id, $staff_user_id, $status_id, $errorMessage, $source_id, $tool_status_id;

    public function index()
    {

        $tools = Tool::with(['source', 'category', 'type', 'status', 'security_keys', 'position_keys'])->get();

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
            if (auth()->user()->hasRole('requester')) {
                $data['borrower_id'] = Borrower::where('user_id', auth()->user()->id)->value('id');
            }

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
