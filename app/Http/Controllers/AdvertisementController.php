<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Advertisement;
use App\Models\Filters;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user');
    }

    public function index()
    {
        $adverts = Advertisement::all();
        return view('advert.index', compact('adverts'));
    }

    public function show(Advertisement $advertisement)
    {
        return view('advert.show', compact('advertisement'));
    }

    public function create()
    {
        return view('advert.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'filter' => 'required',
        ]);

        $advert = Advertisement::create([
            'id' => rand(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'start_date' => $request->input('start_date'),
        ]);

        $filters = explode(",", $request->input('filter'));

        foreach ($filters as $filter) {
            $filterDB = Filters::create([
                'id' => rand(),
                'name' => $filter,
            ]);
            $advert->filters()->attach($filterDB->id);
        }
        $advert->user()->associate(Auth::user()->id);
        $advert->save();

        return redirect()->route('advert.index')->with('success', 'Reklamen blev successfuldt oprettet');
    }
}
