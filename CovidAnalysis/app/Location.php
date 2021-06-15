<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'coordinates_data';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
