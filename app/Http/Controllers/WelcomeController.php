<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $users = User::where('position_id', 3)->get();

        return view('welcome',[
            'users' => $users
        ]);
    }
}
