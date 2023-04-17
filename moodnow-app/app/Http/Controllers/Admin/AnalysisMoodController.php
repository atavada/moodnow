<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalysisMood;
use Illuminate\Http\Request;

class AnalysisMoodController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analysisMoods = AnalysisMood::latest()->get();
        return view('admin.analysisMood.index', compact('analysisMoods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.analysisMood.create');
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
            'quiz_1' => 'required',
            'quiz_2' => 'required',
            'quiz_3' => 'required',
            'quiz_4' => 'required',
            'output' => 'required'
        ]);

        $quiz = AnalysisMood::create([
            'quiz_1' => $request->input('quiz_1'),
            'quiz_2' => $request->input('quiz_2'),
            'quiz_3' => $request->input('quiz_3'),
            'quiz_4' => $request->input('quiz_4'),
            'output' => $request->input('output')
        ]);

        if($quiz){
            //redirect dengan pesan sukses
            return redirect()->route('admin.quiz.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.quiz.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AnalysisMood $analysisMood)
    {
        return view('admin.analysisMood.edit', compact('analysisMood'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnalysisMood $analysisMood)
    {
        $this->validate($request, [
            'quiz_1' => 'required',
            'quiz_2' => 'required',
            'quiz_3' => 'required',
            'quiz_4' => 'required',
            'output' => 'required'
        ]);

        $analysisMood = AnalysisMood::findOrFail($analysisMood->id);
        $analysisMood->update([
            'quiz_1' => $request->input('quiz_1'),
            'quiz_2' => $request->input('quiz_2'),
            'quiz_3' => $request->input('quiz_3'),
            'quiz_4' => $request->input('quiz_4'),
            'output' => $request->input('output')
        ]);
                
        if($analysisMood){
            //redirect dengan pesan sukses
            return redirect()->route('admin.analysisMood.index')->with(['success' => 'Warna Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.analysisMood.index')->with(['error' => 'Warna Gagal Diupdate!']);
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
        $analysisMood = AnalysisMood::findOrFail($id);
        $analysisMood->delete();

        if($analysisMood) {
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
