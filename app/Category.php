<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function workshop(){
    	return $this->hasMany('App\Workshop');
    }
}
