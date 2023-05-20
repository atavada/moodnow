<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    /**
    * __construct
    */
   public function __construct()
   {
       $this->middleware(['permission:dashboards.index']);
   }

    /**
     * index
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
