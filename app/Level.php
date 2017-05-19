<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function workshop(){
    	return $this->hasMany('App\Workshop');
    }
}
