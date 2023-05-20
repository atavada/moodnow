<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Music;
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
    
    /**
     * index
     */
    public function index()
    {
        $userMood = UserMood::where('user_id', auth()->user()->id)->get();
        return view('user.result', compact('userMood'));
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $userMood = UserMood::findOrFail($id);
        $userMood->delete();
        
        return redirect()->route('user.result');
    }
}
