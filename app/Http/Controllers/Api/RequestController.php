<?php

namespace App\Http\Controllers\Api;

use App\Models\Tool;
use App\Models\Option;
use App\Models\Request;
use App\Models\Borrower;
use App\Models\Operator;
use App\Models\ToolRequest;
use App\Models\ToolSecurity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestToolToolSecurityKey;
use Illuminate\Http\Request as HttpRequest;;

class RequestController extends Controller
{
    public $id, $tool_id, $user_id, $borrower_id, $status_id, $position_id, $first_name, $option_id, $estimated_return_date, $purpose, $date_needed, $errorMessage;
    public $toolItems = [];

    public $selectedTools = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrower = Borrower::where('user_id', auth()->user()->id)->first();

        $tools = Tool::with(['category', 'type'])->get();
        $options = Option::all();
    
        // Combine tools and operators into a single array
        $data = [
            'borrower' => [
                'first_name' => $borrower->first_name,
                'middle_name' => $borrower->middle_name,
                'last_name' => $borrower->last_name,
            ],
            'tools' => $tools,
            'options' => $options,
        ];
    
        return response()->json($data);
    }
    

    public function id($id)
    {
        $this->id = $id;
        $request = Request::with('tool_keys.tools')->findOrFail($id);

        $this->tool_id = $request->tool_id;
        $this->borrower_id = $request->borrower_id;
        $this->option_id = $request->option_id;
        $this->estimated_return_date = $request->estimated_return_date;
        $this->purpose = $request->purpose;
        $this->date_needed = $request->date_needed;

        // Populate toolItems with the IDs of associated tools
        $this->toolItems = $request->tool_keys->pluck('tool_id')->toArray();

        // Populate selectedTools with the associated tools
        $this->selectedTools = $request->tool_keys->pluck('tools')->flatten();

        //$this->borrower_id1 = Borrower::where('user_id', auth()->user()->id)->value('id');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HttpRequest $httpRequest)
    {
        $data = $httpRequest->validate([
            'borrower_id' => 'nullable',
            'option_id' => 'nullable',
            'estimated_return_date' => 'nullable|date',
            'purpose' => 'nullable',
            'toolItems' => 'nullable|array',
            'date_needed' => 'nullable|date',
        ]);

        // Assign authenticated user's id to borrower_id if the user has the "requester" role
        if (auth()->user()->hasRole('requester')) {
            $data['borrower_id'] = Borrower::where('user_id', auth()->user()->id)->value('id');
        }

        // Set the default status_id for non-admin requests
        $data['status_id'] = 11; // Pending
        // Update the status of tools associated with the request to "In request"
        Tool::whereIn('id', $data['toolItems'])->update(['status_id' => 14]);
        $data['user_id'] = auth()->user()->id;

        // Create the request
        $request = Request::create($data);

        // Check if toolItems are provided and if they are valid
        if (isset($data['toolItems']) && is_array($data['toolItems'])) {
            foreach ($data['toolItems'] as $toolId) {
                $tool = Tool::find($toolId);

                if (!$tool) {
                    return response()->json(['error' => 'Tool not found'], 404);
                }

                // Create tool request
                $toolRequest = ToolRequest::create([
                    'request_id' => $request->id,
                    'tool_id' => $toolId,
                    'status_id' => 14, // "In request"
                ]);

                // Fetch all security_ids for the current tool
                $securityIds = ToolSecurity::where('tool_id', $toolId)->pluck('security_id')->toArray();

                // Create a record in request_tool_tool_security table for each security_id
                foreach ($securityIds as $securityId) {
                    RequestToolToolSecurityKey::create([
                        'request_tools_id' => $toolRequest->id,
                        'security_id' => $securityId,
                        'status_id' => 11,
                        'request_id' => $request->id,
                    ]);
                }

                // Update current_security_id and max_security_id for the request
                $request->update([
                    'current_security_id' => min($securityIds),
                    'max_security_id' => max($securityIds)
                ]);
            }
        } else {
            return response()->json(['error' => 'No toolItems provided'], 400);
        }

        return response()->json($request, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return Request::find($id);
        //$this->id = $id;
        $request = Request::with('tool_keys.tools')->findOrFail($id);

        // $this->tool_id = $request->tool_id;
        // $this->borrower_id = $request->borrower_id;
        // $this->option_id = $request->option_id;
        // $this->estimated_return_date = $request->estimated_return_date;
        // $this->purpose = $request->purpose;
        // $this->date_needed = $request->date_needed;

        // // Populate toolItems with the IDs of associated tools
        // $this->toolItems = $request->tool_keys->pluck('tool_id')->toArray();

        // // Populate selectedTools with the associated tools
        // $this->selectedTools = $request->tool_keys->pluck('tools')->flatten();

        //$this->borrower_id1 = Borrower::where('user_id', auth()->user()->id)->value('id');
        return $request;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HttpRequest $httpRequest, string $id)
    {
        $request = Request::find($id);
        $request->update($httpRequest->all());
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Request::destroy(($id));
    }

    public function search($request_number)
    {
        return Request::where('request_number', 'Like', '%' . $request_number . '%')->get();
    }

    // public function tools()
    // {
    //     $tools = Tool::all();
    //     return $tools;
    // }
}
