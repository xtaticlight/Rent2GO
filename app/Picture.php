<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

	//
    public function material(){
        $this->belongsTo('App\Material');
    }
}
