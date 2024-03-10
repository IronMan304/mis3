<?php

namespace App\Http\Controllers\Api;

use App\Models\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;; 

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Request::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HttpRequest $httpRequest)
    {
        $data = $httpRequest->validate([
            'user_id' => 'nullable',
            'borrower_id' => 'nullable',
            'option_id' => 'required',
            'estimated_return_date' => 'required|date',
            'purpose' => 'nullable',
            'toolItems' => 'required|array',
            'date_needed' => 'required|date',
        ]);

        return Request::create($httpRequest->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Request::find($id);
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

    public function search($request_number){
        return Request::where('request_number', 'Like', '%'.$request_number.'%')->get();
    }
}
