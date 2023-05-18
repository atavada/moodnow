<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use App\Models\Color;
use App\Models\UserMood;
use Illuminate\Http\Request;

class DetectController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.detect.index');
    }

    public function detectQuiz() 
    {
        $quizs = Questionnaire::get();
        return view('user.detect.detectQuiz', compact('quizs'));
    }

    public function prosesQuiz(Request $request, Questionnaire $quiz)
    {
        $quiz_id = $request->input('quiz_id');
        $ranges = $request->input('range');
    
        $countResultBaik = 0;
        $countResultBuruk = 0;
        foreach ($quiz_id as $key => $quizid) {
            $detect = $ranges[$key];
            $quiz = Questionnaire::find($quizid);
    
            if ($detect >= 5) {
                if($quiz->output == 'mood_baik') {
                    $countResultBaik++;
                } else {
                    $countResultBuruk++;
                }
            }
        }
        $result = $countResultBaik > $countResultBuruk ? 'mood_baik' : 'mood_buruk';

        $userMood = UserMood::create([
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'detect_quiz' => $result
        ]);
        // return view('user.detect.result', compact('userMood'));
        return redirect()->route('user.detect.result');
    }

    public function detectColor()
    {
        return view('user.detect.detectColor');
    }

    public function detectFace()
    {
        return view('user.detect.detectFace');
    }    
    
    public function result(UserMood $userMood)
    {
        return view('user.detect.result', compact('userMood'));
    }
}
