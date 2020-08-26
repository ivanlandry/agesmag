<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function commentaires(){
        return $this->hasMany('App\Commentaire');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function favoris(){
        return $this->hasMany('App\Favoris');
    }
}
