<?php

namespace App\Http\Controllers\Request;

use App\Models\Request;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest; // Rename to avoid conflicts
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
    public function print_request_letter($id)
    {
        $request = \App\Models\Request::with('tool_keys.tools')->findOrFail($id);
        $requests = \App\Models\Request::with('borrower')->where('id', $id)->get();
        $president = User::with('position')->whereHas('position', function ($query) {
            $query->where('id', 6);
        })->firstOrFail();
        $vp = User::with('position')->whereHas('position', function ($query) {
            $query->where('id', 5);
        })->firstOrFail();

        return view('layouts.print.request_letter', [
            'request' => $request,
            'requests' => $requests,
            'president' => $president,
            'vp' => $vp,
        ]);
    }
}
