<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rentee extends Model {

	//
    public function user(){
        $this->belongsTo('App\User');
    }

}
