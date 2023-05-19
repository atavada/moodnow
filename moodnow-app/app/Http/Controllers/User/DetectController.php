<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use App\Models\Color;
use App\Models\Music;
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

    public function detectMood() 
    {
        $quizs = Questionnaire::get();
        $colors = Color::get();
        return view('user.detect.detectMood', compact('quizs', 'colors'));
    }

    public function prosesDetect(Request $request, Questionnaire $quiz)
    {
        $quiz_id = $request->input('quiz_id');
        $ranges = $request->input('range');
        $color_pick = $request->input('color');
    
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
        $resultQuiz = $countResultBaik >= $countResultBuruk ? 'mood_baik' : 'mood_buruk';
       
        // color
        $colorBaik = $request->input('color') == 'mood_baik' ? 1 : 0;
        $colorBuruk = $request->input('color') == 'mood_buruk' ? 1 : 0;

        $countBaik = $countResultBaik + $colorBaik;
        $countBuruk = $countResultBuruk + $colorBuruk;

        $resultMood = $countBaik >= $countBuruk ? 'mood_baik' : 'mood_buruk';

        $userMood = UserMood::create([
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'detect_quiz' => $resultQuiz,
            'detect_color' => $color_pick,
            'mood_result' => $resultMood
        ]);

        return redirect()->route('user.detect.result', compact('userMood'));
    }
    
    public function result()
    {
        $user_mood = UserMood::latest()->first();
        $music = Music::where('output', $user_mood->mood_result)->get();
        return view('user.detect.result', compact('user_mood', 'music'));
    }
}
