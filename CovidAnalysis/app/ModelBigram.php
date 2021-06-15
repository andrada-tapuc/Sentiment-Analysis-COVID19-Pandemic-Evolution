<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBigram extends Model
{
    protected $table = 'model_bigram';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
