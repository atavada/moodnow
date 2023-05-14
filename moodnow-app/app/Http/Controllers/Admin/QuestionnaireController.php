<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:quizs.index|quizs.create|quizs.edit|quizs.delete']);
    }

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
      /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $quiz)
    {
        return view('admin.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $quiz)
    {
        $this->validate($request, [
            'title' => 'required|unique:questionnaires'
        ]);

        $quiz = Questionnaire::findOrFail($quiz->id);
        $quiz->update([
            'title' => $request->input('title'),
        ]);
                
        if($quiz){
            //redirect dengan pesan sukses
            return redirect()->route('admin.quiz.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.quiz.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $quiz = Questionnaire::findOrFail($id);
        $quiz->delete();

        if($quiz) {
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
