<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $guarded = ['id'];

    public function brand()
    {
        return $this->belongsTo('App\Model\Brand');
    }

    public function color()
    {
        return $this->belongsTo('App\Model\Color');
    }

    public function comments()
    {
        return $this->hasMany('App\Model\Comment', 'vehicle_id');
    }

    public function images()
    {
        return $this->hasMany('App\Model\Image', 'vehicle_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Model\Rating', 'vehicle_id');
    }

    public function status(){
        return $this->belongsTo('App\Model\Status');
    }

    public function type(){
        return $this->belongsTo('App\Model\Type');
    }

    public function rentings(){
        return $this->hasMany('App\Model\Renting', 'vehicle_id');
    }

    public function ve_status(){
        return $this->belongsTo('App\Model\Ve_status');
    }
}
