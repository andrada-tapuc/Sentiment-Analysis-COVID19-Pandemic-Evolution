<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryFrequency extends Model
{
    protected $table = 'country_frequency';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
