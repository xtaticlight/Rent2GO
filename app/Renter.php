<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{

    //
    public function user()
    {
        $this->belongsTo('App\User');
    }
    public function material()
    {
        $this->belongsTo('App\Material');
    }
}