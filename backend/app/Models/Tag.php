<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use App\Models\Stock;

class Tag extends Model
{
    use Searchable;
    use Notifiable;

    protected $guarded = [
        'id'
    ];

    public function stocks()
    {
        return $this->belongsToMany(Stock::class);
    }

    public function searchableAs()
    {
        return 'tags_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $stocks = $this->stocks;

        for ($i = 0; $i < $stocks->count(); $i++) {

            $array["stock_names"][$i] = $stocks[$i]['name'];
        }


        return $array;
    }
}
