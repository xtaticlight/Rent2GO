<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    //pu
    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rentees()
    {
        return  $this->hasOne('App\Rentee');
    }
}
