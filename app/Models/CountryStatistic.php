<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CountryStatistic extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'country',
        'confirmed',
        'recovered',
        'deaths',
    ];

    public $translatable = [
        'country',
    ];
}
