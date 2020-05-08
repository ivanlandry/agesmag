<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];

    public function categorie(){
        return $this->belongsTo('App\CategoriePost');
    }

    public function ville(){
        return $this->belongsTo('App\Ville');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
