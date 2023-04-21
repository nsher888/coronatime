<?php

namespace App\Console\Commands;

use App\Models\CountryStatistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCountryData extends Command
{
    protected $signature = 'coronatime:fetch-country-data';

    protected $description = 'Get country data from API and store in database.';

    public function handle()
    {
        $countriesData = Http::get('https://devtest.ge/countries')->json();

        foreach ($countriesData as $country) {
            $statisticsData = Http::post('https://devtest.ge/get-country-statistics', [
                'code' => $country['code'],
            ])->json();

            CountryStatistic::updateOrCreate([
                'country' => json_encode($country['name'])
            ], [
                'confirmed' => $statisticsData['confirmed'],
                'recovered' => $statisticsData['recovered'],
                'deaths' => $statisticsData['deaths'],
            ]);
        }
    }
}
