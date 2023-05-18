<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserMood;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $userMood = UserMood::where('user_id', auth()->user()->id)->get();
        return view('user.result', compact('userMood'));
    }
}
