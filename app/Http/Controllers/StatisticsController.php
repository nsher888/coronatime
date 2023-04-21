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
        $query = CountryStatistic::query();

        if (request()->query('s')) {
            $query->whereRaw("LOWER(json_unquote(json_extract(`country`, '$." . app()->getLocale() . "'))) LIKE ?", ['%' . strtolower(request()->query('s')) . '%']);
        }

        $sort_by = request()->query('sort_by', 'country');
        $sort_order = request()->query('sort_order', 'asc');
        $query->orderBy($sort_by, $sort_order);

        $country_stats = $query->get();

        return view('country-dashboard', [
            "new_cases" => number_format(CountryStatistic::sum('confirmed')),
            "recovered" => number_format(CountryStatistic::sum('recovered')),
            "deaths" => number_format(CountryStatistic::sum('deaths')),
            "country_stats" => $country_stats,
            "sort_by" => $sort_by,
            "sort_order" => $sort_order
        ]);
    }




}
