<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['description', 'user_id'];

    public function downloads()
    {
        return $this->hasMany('App\Download');
    }
}
