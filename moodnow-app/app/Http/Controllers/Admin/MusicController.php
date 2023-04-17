<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = \App\models\Music::latest()->when(request()->q, function($musics) {
            $musics = $musics->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);        

        return view('admin.music.index', compact('musics'));
    }

    public function indexMoodnow()
    {
        $musics = Music::latest()->when(request()->q, function($musics) {
            $musics = $musics->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.music.index', compact('musics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $musics = Music::latest()->get();
        return view('admin.music.create', compact('musics'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'embed' => 'required|string|max:255',
        ]);
        
        $music = \App\models\Music::create([
            'title' => $request['title'],
            'genre' => $request['genre'],
            'embed' => $request['embed'],
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
        $musics = Music::latest()->get();
        return view('admin.music.edit', compact('music', 'musics'));
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
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'embed' => 'required|string|max:255',
        ]);
        
        $music = Music::findOrFail($music->id);

        $music->update([
            'title' => $request->input('title'),
            'genre' => $request->input('genre'),
            'embed' => $request->input('embed')
        ]);
    
        if ($music) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.music.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
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
        $music = \App\models\Music::findOrFail($id);
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
