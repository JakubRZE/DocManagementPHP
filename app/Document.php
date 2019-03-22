<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function downloads()
    {
        return $this->hasMany('App\Download');
    }
}
