<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('user.index');
    }

    public function tes()
    {
        return view('admin.quiz.index');
    }
}
