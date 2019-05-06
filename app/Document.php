<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Document extends Model
{

    protected $fillable = ['description', 'user_id','title','path', 'type'];

    public function downloads()
    {
        return $this->hasMany('App\Download');
    }
}
