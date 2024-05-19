<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Tool;
use App\Models\Option;
use App\Models\Status;
use App\Models\Request;
use App\Models\Borrower;
use App\Models\Operator;
use App\Models\ToolRequest;
use App\Models\ToolSecurity;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\RequestToolToolSecurityKey;
use App\Http\Livewire\Request\RequestStart;
use Illuminate\Http\Request as HttpRequest;


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
        $borrower = Borrower::where('user_id', auth()->user()->id)
            ->with('requests.tool_keys.tools', 'requests.tool_keys.status', 'requests.tool_keys.toolStatus', 'course', 'requests.status', 'service_requests.service', 'service_requests.borrower', 'service_requests.user', 'service_requests.tool.source', 'service_requests.status', 'service_requests.source', 'service_requests.operator', 'service_requests.Technician', 'service_requests.ToolStatus')
            ->first();


        $tools = Tool::with(['category', 'type', 'status', 'security_keys', 'position_keys'])->get();
        $options = Option::all();
        $status = Status::all();

        // Limit the number of requests to 50
        //$limitedRequests = $borrower->requests->take(5);

        // Combine tools and operators into a single array
        $data = [
            'borrower' => [
                'first_name' => $borrower->first_name,
                'middle_name' => $borrower->middle_name,
                'last_name' => $borrower->last_name,
                'email' => $borrower->user->email,
                'position_id' => $borrower->position_id,
                'college' => $borrower->college->description,
                'course' => $borrower->course->description,
                //'age' => $borrower->age->description,
                'gender' => $borrower->sex->description,
                'service_requests' => $borrower->service_requests,
                'contact_number' => $borrower->contact_number,
                'id_number' => $borrower->id_number,
                'requests' => $borrower->requests,
                //'requests' => $limitedRequests,
                //'request_tools' => $requestToolKeys,
            ],
            'tools' => $tools,
            'options' => $options,
            'status' => $status
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

        $data['dt_requested_user_id'] = auth()->user()->id;
        $data['dt_requested'] = Carbon::now()->setTimezone('Asia/Manila');

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
        $lastRequestNumber = DB::table('requests')
            ->where('request_number', 'like', $prefix . 'ER' . $currentYear . '%')
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
        $data['request_number'] = $prefix . 'ER' . $currentYear . $newNumberPadded;




        // Set the default status_id for non-admin requests
        $data['status_id'] = 11; // Pending

        // Validate the status of selected tools
        $invalidTools = Tool::whereIn('id', $data['toolItems'])->where('status_id', '<>', 1)->exists();
        if ($invalidTools) {
            return response()->json(['error' => 'All selected tools must have status "Available" (status_id: 1)'], 400);
        }

        // Update the status of tools associated with the request to "In request"
        Tool::whereIn('id', $data['toolItems'])->update(['status_id' => 14]);
        $data['user_id'] = auth()->user()->id;

        // Create the request


        // Check if toolItems are provided and if they are valid
        if (isset($data['toolItems']) && is_array($data['toolItems'])) {

            $request = Request::create($data);
            // Initialize minSecurityId with a value greater than any possible security_id
            $minSecurityId = PHP_INT_MAX;
            $maxSecurityId = PHP_INT_MIN;

            foreach ($data['toolItems'] as $toolId) {
                $securityIds = ToolSecurity::where('tool_id', $toolId)->pluck('security_id')->toArray();
                $tool = Tool::find($toolId);

                if (!$tool) {
                    return response()->json(['error' => 'Tool not found'], 404);
                }

                // Create tool request
                $toolRequest = ToolRequest::create([
                    'request_id' => $request->id,
                    'tool_id' => $toolId,
                    'status_id' => 14, // "In request"
                    'dt_requested_user_id' => auth()->user()->id,
                    'dt_requested' => Carbon::now()->setTimezone('Asia/Manila'),
                ]);

                // // Fetch all security_ids for the current tool
                // $securityIds = ToolSecurity::where('tool_id', $toolId)->pluck('security_id')->toArray();

                // // Create a record in request_tool_tool_security table for each security_id
                // foreach ($securityIds as $securityId) {
                //     RequestToolToolSecurityKey::create([
                //         'request_tools_id' => $toolRequest->id,
                //         'security_id' => $securityId,
                //         'status_id' => 11,
                //         'request_id' => $request->id,
                //     ]);
                // }

                // // Update current_security_id and max_security_id for the request
                // $request->update([
                //     'current_security_id' => min($securityIds),
                //     'max_security_id' => max($securityIds)
                // ]);

                // Fetch all security_ids for the current tool
                //  $securityIds = ToolSecurity::where('tool_id', $toolId)->pluck('security_id')->toArray();

                // Update minSecurityId and maxSecurityId if necessary
                $minSecurityId = min($minSecurityId, ...$securityIds);
                $maxSecurityId = max($maxSecurityId, ...$securityIds);
                // Create a record in request_tool_tool_security table for each security_id
                foreach ($securityIds as $securityId) {
                    RequestToolToolSecurityKey::create([
                        'request_tools_id' => $toolRequest->id,
                        'security_id' => $securityId,
                        'status_id' => 11,
                        'request_id' => $request->id,
                    ]);
                }

                $request->update(['current_security_id' =>  $minSecurityId]);
                $request->update(['max_security_id' =>  $maxSecurityId]);
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

    public function count()
    {
        //$count = Request::count(); // Get the count using your model


        // Retrieve requests with status_id equal to 11
        $requests = Request::all();

        $requestsPending = Request::where('status_id', 11)
            ->orderBy('id', 'desc')
            ->with(['status' => function ($query) {
                $query->select('id', 'description');
            }, 'borrower' => function ($query) {
                $query->select('id', 'first_name', 'middle_name', 'last_name');
            }])

            ->get();


        $requestsPendingAndApproved = Request::where('status_id', 11)
            ->orWhere('status_id', 10)
            ->orderBy('updated_at', 'desc')
            ->with(['status' => function ($query) {
                $query->select('id', 'description');
            }, 'borrower' => function ($query) {
                $query->select('id', 'first_name', 'middle_name', 'last_name');
            }])

            ->get();



        $roleIds = Auth::user()->roles->pluck('id');

        if (Auth::user()->hasRole('vice-president')) {
            // Query for president users, only if vice-president already approved the request
            $requestsReviewed = Request::where('status_id', 16)
                ->orderBy('id', 'desc')
                ->with([
                    'status' => function ($query) {
                        $query->select('id', 'description');
                    },
                    'borrower' => function ($query) {
                        $query->select('id', 'first_name', 'middle_name', 'last_name');
                    }
                ])
                ->whereHas('requestToolToolSecurityKey', function ($query) {
                    $query->where('security_id', 5) // Ensure it checks for vice-president security_id
                        ->where('status_id', 11); // Ensure it's pending by vice-president
                })
                ->whereHas('requestToolToolSecurityKey', function ($query) use ($roleIds) {
                    $query->whereIn('security_id', $roleIds); // Ensure it also checks for president's security_id
                })
                ->get();
        } elseif (Auth::user()->hasRole('president')) {
            // Query for president users, only if vice-president already approved the request
            $requestsReviewed = Request::where('status_id', 16)
                ->orderBy('id', 'desc')
                ->with([
                    'status' => function ($query) {
                        $query->select('id', 'description');
                    },
                    'borrower' => function ($query) {
                        $query->select('id', 'first_name', 'middle_name', 'last_name');
                    }
                ])
                ->whereHas('requestToolToolSecurityKey', function ($query) {
                    $query->where('security_id', 5) // Ensure it checks for vice-president security_id
                        ->where('status_id', 10); // Ensure it's approved by vice-president
                })
                ->whereHas('requestToolToolSecurityKey', function ($query) use ($roleIds) {
                    $query->whereIn('security_id', $roleIds); // Ensure it also checks for president's security_id
                })
                ->get();
        } else {
            // Query for admin users
            $requestsReviewed = Request::where('status_id', 16)
                ->orderBy('id', 'desc')
                ->with([
                    'status' => function ($query) {
                        $query->select('id', 'description');
                    },
                    'borrower' => function ($query) {
                        $query->select('id', 'first_name', 'middle_name', 'last_name');
                    }
                ])
                ->get();
        }




        $requestsApproved = Request::where('status_id', 10)
            ->orderBy('id', 'desc')
            ->with(['status' => function ($query) {
                $query->select('id', 'description');
            }, 'borrower' => function ($query) {
                $query->select('id', 'first_name', 'middle_name', 'last_name');
            }])

            ->get();

        if (Auth::user()->hasRole('operator')) {
            $requestsStarted = Request::where('status_id', 6)
                ->whereHas('RequestOperatorKey', function ($query) {
                    $query->where('operator1_id', Auth::user()->id);
                })
                ->orderBy('id', 'desc')
                ->with(['status' => function ($query) {
                    $query->select('id', 'description');
                }, 'borrower' => function ($query) {
                    $query->select('id', 'first_name', 'middle_name', 'last_name');
                }])
                ->get();
        } else {
            $requestsStarted = Request::where('status_id', 6)
                ->orderBy('id', 'desc')
                ->with(['status' => function ($query) {
                    $query->select('id', 'description');
                }, 'borrower' => function ($query) {
                    $query->select('id', 'first_name', 'middle_name', 'last_name');
                }])
                ->get();
        }

        $requestsCompleted = Request::where('status_id', 12)
            ->orderBy('id', 'desc')
            ->with(['status' => function ($query) {
                $query->select('id', 'description');
            }, 'borrower' => function ($query) {
                $query->select('id', 'first_name', 'middle_name', 'last_name');
            }])
            ->get();

        $requestsIncomplete = Request::where('status_id', 13)
            ->orderBy('id', 'desc')
            ->with(['status' => function ($query) {
                $query->select('id', 'description');
            }, 'borrower' => function ($query) {
                $query->select('id', 'first_name', 'middle_name', 'last_name');
            }])
            ->get();

        $requestsRejected = Request::where('status_id', 15)
            ->orderBy('id', 'desc')
            ->with(['status' => function ($query) {
                $query->select('id', 'description');
            }, 'borrower' => function ($query) {
                $query->select('id', 'first_name', 'middle_name', 'last_name');
            }])
            ->get();

        $requestsCancelled = Request::where('status_id', 8)
            ->orderBy('id', 'desc')
            ->with(['status' => function ($query) {
                $query->select('id', 'description');
            }, 'borrower' => function ($query) {
                $query->select('id', 'first_name', 'middle_name', 'last_name');
            }])
            ->get();

        // Count the number of requests with status_id equal to 11
        $countRequests = $requests->count();

        $countPending = $requestsPending->count();
        $countReviewed = $requestsReviewed->count();
        $countApproved = $requestsApproved->count();
        $countStarted = $requestsStarted->count();
        $countCompleted = $requestsCompleted->count();
        $countIncomplete = $requestsIncomplete->count();

        $countRejected = $requestsRejected->count();
        $countCancelled = $requestsCancelled->count();

        // Store request numbers in an array
        $requestNumbers = $requests->sortByDesc('id');

        $requestsPending = $requestsPending->sortByDesc('id');
        $requestsReviewed = $requestsReviewed->sortByDesc('id');
        $requestsApproved = $requestsApproved->sortByDesc('id');
        $requestsStarted = $requestsStarted->sortByDesc('id');
        $requestsCompleted = $requestsCompleted->sortByDesc('id');
        $requestsIncomplete = $requestsIncomplete->sortByDesc('id');

        $requestsRejected = $requestsRejected->sortByDesc('id');
        $requestsCancelled = $requestsCancelled->sortByDesc('id');



        return response()->json([
            'requests' => $requests,
            'countRequests' => $countRequests,
            'countPending' => $countPending,
            'countReviewed' => $countReviewed,
            'countApproved' => $countApproved,
            'countStarted' => $countStarted,
            'countCompleted' => $countCompleted,
            'countIncomplete' => $countIncomplete,
            'countRejected' => $countRejected,
            'countCancelled' => $countCancelled,

            'requestNumbers' => $requestNumbers,
            'requestsPending' => $requestsPending,
            'requestsReviewed' => $requestsReviewed,
            'requestsApproved' => $requestsApproved,
            'requestsStarted' => $requestsStarted,
            'requestsPendingAndApproved' => $requestsPendingAndApproved,
            'requestsCompleted' => $requestsCompleted,
            'requestsIncomplete' => $requestsIncomplete,
            'requestsRejected' => $requestsRejected,
            'requestsCancelled' => $requestsCancelled,
        ]);
    }

    public function countService()
    {
        //$count = Request::count(); // Get the count using your model

        // Retrieve requests with status_id equal to 11
        $serviceRequests = ServiceRequest::all();

        $requestsPendingService = ServiceRequest::with(['status' => function ($query) {
            $query->select('id', 'description');
        }, 'borrower' => function ($query) {
            $query->select('id', 'first_name', 'middle_name', 'last_name');
        }])
            ->where('status_id', 11) //pending
            ->orderBy('id', 'desc')
            ->get();

        $requestsReviewedService = ServiceRequest::with(['status' => function ($query) {
            $query->select('id', 'description');
        }, 'borrower' => function ($query) {
            $query->select('id', 'first_name', 'middle_name', 'last_name');
        }])
            ->where('status_id', 16) //pending
            ->orderBy('id', 'desc')
            ->get();

        $requestsApprovedService = ServiceRequest::with(['status' => function ($query) {
            $query->select('id', 'description');
        }, 'borrower' => function ($query) {
            $query->select('id', 'first_name', 'middle_name', 'last_name');
        }])
            ->where('status_id', 10) //pending
            ->orderBy('id', 'desc')
            ->get();

        $requestsStartedService = ServiceRequest::with(['status' => function ($query) {
            $query->select('id', 'description');
        }, 'borrower' => function ($query) {
            $query->select('id', 'first_name', 'middle_name', 'last_name');
        }])
            ->where('status_id', 6) //pending
            ->orderBy('id', 'desc')
            ->get();

        $requestsCompletedService = ServiceRequest::with(['status' => function ($query) {
            $query->select('id', 'description');
        }, 'borrower' => function ($query) {
            $query->select('id', 'first_name', 'middle_name', 'last_name');
        }])
            ->where('status_id', 12) //pending
            ->orderBy('id', 'desc')
            ->get();
        $requestsIncompleteService = ServiceRequest::with(['status' => function ($query) {
            $query->select('id', 'description');
        }, 'borrower' => function ($query) {
            $query->select('id', 'first_name', 'middle_name', 'last_name');
        }])
            ->where('status_id', 13) //pending
            ->orderBy('id', 'desc')
            ->get();
        $requestsRejectedService = ServiceRequest::with(['status' => function ($query) {
            $query->select('id', 'description');
        }, 'borrower' => function ($query) {
            $query->select('id', 'first_name', 'middle_name', 'last_name');
        }])
            ->where('status_id', 15) //pending
            ->orderBy('id', 'desc')
            ->get();
        $requestsCancelledService = ServiceRequest::with(['status' => function ($query) {
            $query->select('id', 'description');
        }, 'borrower' => function ($query) {
            $query->select('id', 'first_name', 'middle_name', 'last_name');
        }])
            ->where('status_id', 8) //pending
            ->orderBy('id', 'desc')
            ->get();

        $countPendingService = $requestsPendingService->count();
        $countReviewedService = $requestsReviewedService->count();
        $countApprovedService = $requestsApprovedService->count();
        $countStartedService = $requestsStartedService->count();
        $countCompletedService = $requestsCompletedService->count();
        $countIncompleteService = $requestsIncompleteService->count();
        $countRejectedService = $requestsRejectedService->count();
        $countCancelledService = $requestsCancelledService->count();

        return response()->json([
            // 'countRequests' => $countRequests,
            'countPendingService' => $countPendingService,
            'countReviewedService' => $countReviewedService,
            'countApprovedService' => $countApprovedService,
            'countStartedService' => $countStartedService,
            'countCompletedService' => $countCompletedService,
            'countIncompleteService' => $countIncompleteService,
            'countRejectedService' => $countRejectedService,
            'countCancelledService' => $countCancelledService,

            'requestsPendingService' => $requestsPendingService,
            'requestsReviewedService' => $requestsReviewedService,
            'requestsApprovedService' => $requestsApprovedService,
            'requestsStartedService' => $requestsStartedService,
            'requestsCompletedService' => $requestsCompletedService,
            'requestsIncompleteService' => $requestsIncompleteService,
            'requestsRejectedService' => $requestsRejectedService,
            'requestsCancelledService' => $requestsCancelledService,
        ]);
    }
}
