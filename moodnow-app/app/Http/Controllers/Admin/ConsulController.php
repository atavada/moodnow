<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consul;
use App\Models\User;

class ConsulController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:consuls.index|consuls.edit|consuls.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consuls = Consul::latest()->when(request()->q, function($consuls) {
            $consuls = $consuls->where('question', 'like', '%'. request()->q . '%');
        })->paginate(20);

        return view('admin.consul.index', compact('consuls'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Consul $consul)
    {
        $users = User::latest()->get();
        return view('admin.consul.edit', compact('users', 'consul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consul $consul)
    {
        $this->validate($request,[
            'answer' => 'required'
        ]);
        
        $consul = Consul::findOrFail($consul->id);
        $consul->update([
            'answer' => $request->input('answer')
        ]);

        if($consul){
            //redirect dengan pesan sukses
            return redirect()->route('admin.consul.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.consul.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consul = Consul::findOrFail($id);
        $consul->delete();

        if($consul){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
