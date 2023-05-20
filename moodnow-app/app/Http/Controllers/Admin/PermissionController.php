<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * __construct
     */
    public function __construct()
    {
        $this->middleware(['permission:permissions.index']);
    } 

    /**
     * function index
     */
    public function index()
    {
        $permissions = Permission::latest()->when(request()->q, function($permissions) {
            $permissions = $permissions->where('name', 'like', '%'. request()->q . '%');
        })->paginate(5);

        return view('admin.permission.index', compact('permissions'));
    }
}
