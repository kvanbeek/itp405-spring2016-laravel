<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    //
    public function format(){
        return $this->belongsTo('App\Models\Format');
    }

    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }

    public function label(){
        return $this->belongsTo('App\Models\Label');
    }

    public function rating(){
        return $this->belongsTo('App\Models\Rating');
    }

    public function sound(){
        return $this->belongsTo('App\Models\Sound');
    }
}
