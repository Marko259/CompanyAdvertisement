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
            'contact_info' => 'required',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'filter' => 'required',
        ]);

        $advert = Advertisement::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'contact_info' => $request->input('contact_info'),
            'price' => $request->input('price'),
            'start_date' => $request->input('start_date'),
        ]);

        $filters = explode(",", $request->input('filter'));

        foreach ($filters as $filter) {
            $filterDB = Filters::create([
                'name' => $filter,
            ]);
            $advert->filters()->attach($filterDB->id);
        }
        $advert->user()->associate(Auth::user()->id);
        $advert->save();

        return redirect()->route('advert.index')->with('success', 'Reklamen blev successfuldt oprettet');
    }

    public function edit(Advertisement $advertisement)
    {
        return view('advert.edit', compact('advertisement'));
    }

    public function update(Request $request, Advertisement $advertisement)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'contact_info' => 'required',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'filter' => 'required',
        ]);

        foreach ($advertisement->filters()->get() as $filter) {
            $advertisement->filters()->detach($filter->id);
            $filter->delete();
        }

        $filters = explode(",", $request->input('filter'));

        foreach ($filters as $filter) {
            $filterDB = Filters::create([
                'name' => $filter
            ]);
            $advertisement->filters()->attach($filterDB->id);
        }

        $advertisement->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'contact_info' => $request->input('contact_info'),
            'price' => $request->input('price'),
            'start_date' => $request->input('start_date'),
        ]);

        return redirect()->route('advert.index')->with('success', 'Reklamen blev successfuldt opdateret');
    }

    public function destroy(Advertisement $advertisement)
    {
        $filters = [];

        foreach ($advertisement->filters()->get() as $filter) {
            array_push($filters, $filter->id);
        }
        $advertisement->filters()->detach();

        foreach ($filters as $filter) {
            $filterDB = Filters::find($filter);
            $filterDB->delete();
        }

        $advertisement->user()->dissociate();
        $advertisement->delete();
        return redirect()->route('advert.index')->with('success', 'Reklamen blev successfuldt slettet');
    }
}
