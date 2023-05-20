<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Consul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    /**
     * __construct
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
        $consuls = Consul::where('user_id', auth()->id())->get();
        return view('user.consul', compact('consuls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required'
        ]);

        $user = Auth::user();
        $consul = Consul::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'question' => $request->input('question')
        ]);

        if($consul) {
            //redirect dengan pesan sukses
            return redirect()->route('user.consul')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.consul')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
