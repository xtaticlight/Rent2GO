<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model {

	//
 public function user(){
     $this->belongsTo('App\User');
 }
}
