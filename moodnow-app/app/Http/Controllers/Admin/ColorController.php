<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::latest()->when(request()->q, function($colors) {
            $colors = $colors->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $colors = Color::latest()->get();
        return view('admin.color.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'hex' => 'required', 'string', 'max:255', 
            'output' => 'required', 'string', 'max:255'
        ]);

        $color = Color::create([
            'name' => $request['name'],
            'hex' => $request['hex'],
            'output' => $request['output']
        ]);
            
        if($color) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.color.index')->with(['success' => 'Warna Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.color.index')->with(['error' => 'Warnz Gagal Disimpan!']);
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        $colors = Color::latest()->get();
        return view('admin.color.edit', compact('color', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            'hex' => 'required', 'string', 'max:255',
            'output' => 'required', 'string', 'max:255'
        ]);

        $color = Color::findOrFail($color->id);

            $color->update([
                'name' => $request->input('name'),
                'hex' => $request->input('hex'),
                'output' => $request->input('output')
            ]);
                
        if($color){
            //redirect dengan pesan sukses
            return redirect()->route('admin.color.index')->with(['success' => 'Warna Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.color.index')->with(['error' => 'Warna Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();

        if($color) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
