<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * __construct
     */
    public function __construct()
    {
        $this->middleware(['permission:colors.index|colors.create|colors.edit|colors.delete']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::latest()->when(request()->q, function($colors) {
            $colors = $colors->where('name', 'like', '%'. request()->q . '%');
        })->paginate(5);

        return view('admin.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quizs = Questionnaire::latest()->get();
        return view('admin.color.create', compact('quizs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required','unique:colors',
            'hex' => 'required'
        ]);

        $quiz = Questionnaire::findOrFail($request->input('quiz_id'));
        $color = Color::create([
            'name' => $request->input('name'),
            'hex' => $request->input('hex'),
            'quiz_id' => $quiz->id,
            'mood' => $quiz->mood,
            'output' => $quiz->output
        ]);

        if($color) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.color.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.color.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        $quizs = Questionnaire::latest()->get();
        return view('admin.color.edit', compact('color', 'quizs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $this->validate($request, [
            'name' => 'required','unique:colors'.$color->id,
            'hex' => 'required'
        ]);

        $quiz = Questionnaire::findOrFail($request->input('quiz_id'));
        $color = Color::findOrFail($color->id);
        $color->update([
            'name' => $request->input('name'),
            'hex' => $request->input('hex'),
            'quiz_id' => $quiz->id,
            'mood' => $quiz->mood,
            'output' => $quiz->output
        ]);
                
        if($color){
            //redirect dengan pesan sukses
            return redirect()->route('admin.color.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.color.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
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
