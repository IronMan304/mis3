<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Request;
use App\Models\Borrower;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request as HttpRequest;

class RequesterProfileController extends Controller
{
    public function index($requesterId)
    {
        $requester = Borrower::with('requests')->find($requesterId);

        // Check if the requester is found
        if (!$requester) {
            abort(404); // or handle it in a way that fits your application
        }

        // Get the requester's bookings
        $requests = $requester->requests;
        // Check if civil_statuses is not null before accessing its name property
        //$civilStatuses = $requester->civil_statuses ? $requester->civil_statuses->name : null;

        // Check the accept header to determine the response type
        if (request()->wantsJson()) {
            return response()->json([
                'requester' => $requester,
                'requests' => $requests,
            ]);
        } else {
            return view('layouts.requester_profile.index', [
                'requester' => $requester,
                'requests' => $requests,
            ]);
        }
    }

    // public function edit($borrowerId)
    // {
    //     $patient = Patient::findOrFail($borrowerId);
    //     $civilStatuses = CivilStatus::all();
    //     $bloodTypes = BloodType::all();

    //     return view('layouts.patient_booking_history.edit', [
    //         'patient' => $patient,
    //         'civilStatuses' => $civilStatuses,
    //         'bloodTypes' => $bloodTypes,
    //     ]);
    // }

    // public function update(Request $request, $borrowerId)
    // {
    //     $patient = Patient::findOrFail($borrowerId);

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'contact_number' => 'required|string|max:20',
    //         'gender' => ['required', Rule::in(['Male', 'Female'])],
    //         'age' => 'required|integer|min:1',
    //         'civil_status_id' => 'nullable|exists:civil_statuses,id',
    //         'blood_type_id' => 'nullable|exists:blood_types,id',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 400);
    //     }

    //     $patient->update($request->only([
    //         'name',
    //         'address',
    //         'contact_number',
    //         'gender',
    //         'age',
    //         'civil_status_id',
    //         'blood_type_id',
    //     ]));

    //     return redirect()
    //         ->route('pbh.index', ['borrowerId' => $borrowerId])
    //         ->with('success', 'Patient information updated successfully.');
    // }
}
