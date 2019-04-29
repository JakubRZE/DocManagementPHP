<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [ 'user_id','document_id'];

    public function document()
    {
        return $this->belongsTo('App\Document');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
