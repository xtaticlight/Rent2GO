<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    //pu
    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }

    public function renters()
    {
        return $this->hasMany('App\Renter');
    }

    public function rentees()
    {
        return  $this->hasMany('App\Rentee');
    }
}
