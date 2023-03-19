<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Better extends Model
{
    public $fillable = ['name', 'surname', 'bet', 'horse_id'];

    public function horse()
    {
        return $this->belongsTo('App\Horse');
    }
}
