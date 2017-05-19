<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function workshop(){
    	return $this->hasMany('App\Workshop');
    }

    public function application(){
    	return $this->hasMany('App\Application');
    }
}
