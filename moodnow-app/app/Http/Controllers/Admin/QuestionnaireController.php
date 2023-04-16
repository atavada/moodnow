<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizs = Questionnaire::latest()->when(request()->q, function($quizs) {
            $quizs = $quizs->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.quiz.index', compact('quizs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
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
            'title' => 'required|unique:questionnaires'
        ]);

        $quiz = Questionnaire::create([
            'title' => $request->input('title'),
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
