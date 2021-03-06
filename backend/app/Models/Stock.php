<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use App\Models\Tag;

class Stock extends Model
{
    use Searchable;
    use Notifiable;

    protected $guarded = [
        'id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function searchableAs()
    {
        return 'stocks_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $tags = $this->tags;

        for ($i = 0; $i < $tags->count(); $i++) {

            $array["tag_names"][$i] = $tags[$i]['name'];
        }


        return $array;
    }
}
