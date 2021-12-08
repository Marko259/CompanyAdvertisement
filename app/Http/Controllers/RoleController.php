<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin');
    }

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
}
