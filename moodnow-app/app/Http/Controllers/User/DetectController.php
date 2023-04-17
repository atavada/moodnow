<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class DetectController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $quizs = Questionnaire::get();
        return view('user.detect', compact('quizs'));
    }
}
