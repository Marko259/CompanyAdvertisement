<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Filters;

class FrontPageController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('welcome', compact('advertisements'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $advertisements = Advertisement::where('title', 'like', '%' . $search . '%')->get();
        $filters = Filters::where('name', 'like', '%' . $search . '%')->get();
        return view('search', compact('advertisements', 'filters'));
    }
}
