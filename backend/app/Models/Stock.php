<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Stock extends Model
{
    use Searchable;

    protected $guarded = [
        'id'
    ];
}
