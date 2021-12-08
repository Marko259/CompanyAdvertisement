<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user');
    }

    public function index()
    {
        return view('advert.index');
    }
}
