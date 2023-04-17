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
     * index
     *
     * @return void
     */
    public function index()
    {
        $consuls = Consul::get();
        return view('user.consul', compact('consuls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::latest()->get();
        return view('user.consul', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
