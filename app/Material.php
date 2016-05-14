<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    //pu
    public function pictures()
    {
        $this->hasMany('App\Picture');
    }

    public function renters()
    {
        $this->hasMany('App\Renter');
    }

    public function rentees()
    {
        $this->hasMany('App\Rentee');
    }
}
