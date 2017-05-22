<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    public function application(){
        return $this->hasMany('App\Application');
    }

    public function state(){
    	return $this->belongsTo('App\State');
    }

    public function program(){
    	return $this->belongsTo('App\Program');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function level(){
    	return $this->belongsTo('App\Level');
    }
}
