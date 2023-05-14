<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:musics.index|musics.create|musics.edit|musics.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = Music::latest()->when(request()->q, function($musics) {
            $musics = $musics->where('name', 'like', '%'. request()->q . '%');
        })->paginate(5);

        return view('admin.music.index', compact('musics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.music.create');
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
            'title' => 'required','unique:musics',
            'genre' => 'required', 
            'embed' => 'required'
        ]);

        $music = Music::create([
            'title' => $request->input('title'),
            'genre' => $request->input('genre'),
            'embed' => $request->input('embed')
        ]);
            
        if($music) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.music.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.music.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        return view('admin.music.edit', compact('music'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Music $music)
    {
        $this->validate($request, [
            'title' => 'required','unique:musics'.$music->id,
            'genre' => 'required', 
            'embed' => 'required'
        ]);

        $music = Music::findOrFail($music->id);
        $music->update([
            'title' => $request->input('title'),
            'genre' => $request->input('genre'),
            'embed' => $request->input('embed')
        ]);
                
        if($music){
            //redirect dengan pesan sukses
            return redirect()->route('admin.music.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.music.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $music = Music::findOrFail($id);
        $music->delete();

        if($music) {
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
