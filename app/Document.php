<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
//    use Sortable;
//
//    public $sortable = [
//        'description',
//        'email',
//        'created_at',
//        'updated_at'];

    protected $fillable = ['description', 'user_id','title','path', 'type'];

    public function downloads()
    {
        return $this->hasMany('App\Download');
    }
}
