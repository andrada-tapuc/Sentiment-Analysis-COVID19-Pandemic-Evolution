<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentimentFrequency extends Model
{
    protected $table = 'sentiment_frequency_monthly';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
