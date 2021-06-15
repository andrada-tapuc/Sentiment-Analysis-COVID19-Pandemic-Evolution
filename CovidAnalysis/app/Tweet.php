<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'full_tweets';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
