<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Request;
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

        return view('dashboard', [
            'time' => $time,
            'operations' => $operations,
            'equipmentRequestCount' => $equipmentRequestCount,
            'serviceRequestCount' => $serviceRequestCount,
        ]);
    }
}
