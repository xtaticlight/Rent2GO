<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{

    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }

    public function renter()
    {
        return $this->belongsTo('App\User', 'RentBy');
    }

}
