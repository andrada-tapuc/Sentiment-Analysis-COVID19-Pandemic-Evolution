<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTrigram extends Model
{
    protected $table = 'model_trigram';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
