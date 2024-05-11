<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Tool;
use App\Models\User;
use App\Models\College;
use App\Models\Request;
use App\Models\Borrower;
use App\Models\ServiceRequest;

class DashboardController extends Controller
{
    public function index()
    {

        $time = Carbon::now()->format('H');
        $operations = 0;

        $requests = Request::all();
        $equipmentRequestCount = $requests->count();
        $serviceRequestCount = ServiceRequest::count();

        $colleges = College::all();

        $users = User::all();
        $userCount = $users->count();

        $requesters = Borrower::all();
        $requesterCount = $requesters->count();

        $tools = Tool::all();
        $toolCount = $tools->count();

        return view('dashboard', [
            'time' => $time,
            'operations' => $operations,
            'equipmentRequestCount' => $equipmentRequestCount,
            'serviceRequestCount' => $serviceRequestCount,
            'colleges' => $colleges,
            'userCount' => $userCount,
            'requesterCount' => $requesterCount,
            'toolCount' => $toolCount,
        ]);
    }
}
