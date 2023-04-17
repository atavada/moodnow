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
}
