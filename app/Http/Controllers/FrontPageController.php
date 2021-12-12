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
        $advertisements = Advertisement::where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orderBy('title', 'ASC')->get();
        $filters = Filters::where('name', 'like', '%' . $search . '%')->orderBy('name', 'ASC')->get();
        return view('search', compact('advertisements', 'filters'));
    }

    public function show(Advertisement $advertisement)
    {
        return view('advert.show', compact('advertisement'));
    }
}
