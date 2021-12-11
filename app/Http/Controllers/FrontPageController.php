<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;

class FrontPageController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('welcome', compact('advertisements'));
    }
}
