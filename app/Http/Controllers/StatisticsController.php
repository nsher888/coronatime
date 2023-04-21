<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistic;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            "new_cases" => number_format(CountryStatistic::sum('confirmed')),
            "recovered" => number_format(CountryStatistic::sum('recovered')),
            "deaths" => number_format(CountryStatistic::sum('deaths')),
        ]);
    }

    public function show()
    {

        if (request()->query('s')) {
            $country_stats = CountryStatistic::whereRaw("LOWER(json_unquote(json_extract(`country`, '$." . app()->getLocale() . "'))) LIKE ?", ['%' . strtolower(request()->query('s')) . '%'])->get();

        } else {
            $country_stats = CountryStatistic::all();
        }

        return view('country-dashboard', [
            "new_cases" => number_format(CountryStatistic::sum('confirmed')),
            "recovered" => number_format(CountryStatistic::sum('recovered')),
            "deaths" => number_format(CountryStatistic::sum('deaths')),
            "country_stats" => $country_stats
        ]);
    }
}
