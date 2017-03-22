<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user() {
    	return $this->belongsTo('App\user');
    }

    public function chat() {
    	return $this->belongsTo('App\chat');
    }
    
}
