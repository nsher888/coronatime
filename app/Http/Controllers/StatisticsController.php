<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistic;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            "new_cases" => CountryStatistic::sum('confirmed'),
            "recovered" => CountryStatistic::sum('recovered'),
            "deaths" => CountryStatistic::sum('deaths'),
        ]);
    }

    public function show()
    {
        return view('country-dashboard');
    }
}
