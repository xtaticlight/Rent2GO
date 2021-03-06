<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{

    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}