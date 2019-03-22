<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    public function document()
    {
        return $this->belongsTo('App\Document');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
