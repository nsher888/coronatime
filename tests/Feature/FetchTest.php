<?php

namespace Tests\Feature;

use Illuminate\Foundation\Console\Kernel;
use App\Models\CountryStatistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class FetchTest extends TestCase
{
    use RefreshDatabase;

    public function test_fetch_country_data()
    {
        // Run the command
        Artisan::call('coronatime:fetch-country-data');

        // Assert that the country_statistics table has the expected columns
        $this->assertTrue(Schema::hasColumns('country_statistics', [
            'country',
            'confirmed',
            'recovered',
            'deaths',
        ]));
    }

    public function test_kernel_command()
    {
        $status = Artisan::call('coronatime:fetch-country-data');

        $this->assertSame(0, $status);
    }

    public function testFetchCountryDataCommand()
    {
        $this->artisan('coronatime:fetch-country-data')
             ->assertExitCode(0);
    }

    public function test_fetch_countries_command_successful()
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response([
				[
					'code'=> 'GE',
					'name'=> [
						'ka'=> 'საქართველო',
						'en'=> 'georgia',
					],
				],
				[
					'code'=> 'GR',
					'name'=> [
						'ka'=> 'საბერძნეთი',
						'en'=> 'greece',
					],
				],
			], 200),
		]);

		Http::fake(['https://devtest.ge/get-country-statistics']);

		$this->artisan('coronatime:fetch-country-data')->expectsOutput('Countries fetched successfully');
	}

    public function test_index_method()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('dashboard', app()->getLocale()));

        $response->assertStatus(200)
            ->assertViewIs('dashboard')
            ->assertViewHasAll([
                'new_cases' => number_format(CountryStatistic::sum('confirmed')),
                'recovered' => number_format(CountryStatistic::sum('recovered')),
                'deaths' => number_format(CountryStatistic::sum('deaths')),
            ]);
    }

    public function test_show_method_without_sorting_and_searching()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('country-dashboard', app()->getLocale()));

        $response->assertStatus(200)
            ->assertViewIs('country-dashboard')
            ->assertViewHasAll([
                'new_cases' => number_format(CountryStatistic::sum('confirmed')),
                'recovered' => number_format(CountryStatistic::sum('recovered')),
                'deaths' => number_format(CountryStatistic::sum('deaths')),
                'country_stats' => CountryStatistic::all(),
                'sort_by' => 'country',
                'sort_order' => 'asc'
            ]);
    }

    public function test_show_method_with_sorting()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('country-dashboard', [
            'sort_by' => 'confirmed',
            'sort_order' => 'desc',
            'language' => app()->getLocale()
        ]));

        $response->assertStatus(200)
            ->assertViewIs('country-dashboard')
            ->assertViewHasAll([
                'new_cases' => number_format(CountryStatistic::sum('confirmed')),
                'recovered' => number_format(CountryStatistic::sum('recovered')),
                'deaths' => number_format(CountryStatistic::sum('deaths')),
                'country_stats' => CountryStatistic::orderBy('confirmed', 'desc')->get(),
                'sort_by' => 'confirmed',
                'sort_order' => 'desc'
            ]);
    }

    public function test_show_method_with_searching()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $search_query = 'uni';
        $response = $this->get(route('country-dashboard', [
            's' => $search_query,
            'language' => app()->getLocale()

        ]));

        $response->assertStatus(200)
            ->assertViewIs('country-dashboard')
            ->assertViewHasAll([
                'new_cases' => number_format(CountryStatistic::sum('confirmed')),
                'recovered' => number_format(CountryStatistic::sum('recovered')),
                'deaths' => number_format(CountryStatistic::sum('deaths')),
                'country_stats' => CountryStatistic::whereRaw("LOWER(json_unquote(json_extract(`country`, '$." . app()->getLocale() . "'))) LIKE ?", ['%' . strtolower($search_query) . '%'])->get(),
                'sort_by' => 'country',
                'sort_order' => 'asc'
            ]);
    }

}
