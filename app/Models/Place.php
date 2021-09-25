<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'Places';

    protected $fillable = [
        'name',
        'enabled',
        'parent_id',
        'branch_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/places/'.$this->getKey());
    }
    public function getAccountUrlAttribute()
    {
        return url('/account/places/'.$this->getKey());
    }
    public function getShipperUrlAttribute()
    {
        return url('/shipper/places/'.$this->getKey());
    }
    public function getEmployeeUrlAttribute()
    {
        return url('/employee/places/'.$this->getKey());
    }
    public function getMangerUrlAttribute()
    {
        return url('/manger/places/'.$this->getKey());
    }
    public function getAgentUrlAttribute()
    {
        return url('/agent/places/'.$this->getKey());
    }
    public function getCeoUrlAttribute()
    {
        return url('/ceo/places/'.$this->getKey());
    }
    /* ************************ references ************************* */
    /* ************************ many to one ************************* */
    public function parent() {
        return $this->belongsTo('App\Models\Place','parent_id');
    }
    public function branch() {
        return $this->belongsTo('App\Models\Branch','branch_id');
    }
    /* ************************ morph ************************* */

    /* ************************ one to many ************************* */
    public function delivery()
    {
        return $this->hasMany('App\Models\Shipment','place_from_id');

    }
    public function reception()
    {
        return $this->hasMany('App\Models\Shipment','place_to_id');

    }
    public function children() {
        return $this->hasMany('App\Models\Place','parent_id');
    }
    public function start() {
        return $this->hasMany('App\Models\Road','from_id');
    }
    public function end() {
        return $this->hasMany('App\Models\Road','to_id');
    }
    /* ************************ many to many ************************* */
}
