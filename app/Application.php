<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    public function state(){
    	return $this->belongsTo('App\State');
    }

    public function workshop(){
    	return $this->belongsTo('App\Workshop');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function getTechnologyAttribute($value){
    	return $this->workshop->technology;
    }

    public function getCategoryAttribute($value){
    	return $this->workshop->category_id;
    }
}
