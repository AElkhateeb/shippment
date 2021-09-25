<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    protected $fillable = [
        'price',
        'time',
        'enabled',
        'pickup',
        'todoor',
        'express',
        'breakable',
        'from_id',
        'to_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = [
        'resource_url',
        'road'
    ];


    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/roads/'.$this->getKey());
    }
    public function getAccountUrlAttribute()
    {
        return url('/account/roads/'.$this->getKey());
    }
    public function getShipperUrlAttribute()
    {
        return url('/shipper/roads/'.$this->getKey());
    }
    public function getEmployeeUrlAttribute()
    {
        return url('/employee/roads/'.$this->getKey());
    }
    public function getMangerUrlAttribute()
    {
        return url('/manger/roads/'.$this->getKey());
    }
    public function getAgentUrlAttribute()
    {
        return url('/agent/roads/'.$this->getKey());
    }
    public function getCeoUrlAttribute()
    {
        return url('/ceo/roads/'.$this->getKey());
    }
    public function getRoadAttribute(): string
    {
        return $this->placeFrom()->name . ' ' . $this->placeTo()->name;
    }
    /* ************************ references ************************* */
    /* ************************ many to one ************************* */
    public function placeFrom() {
        return $this->belongsTo('App\Models\Place','from_id');
    }
    public function placeTo() {
        return $this->belongsTo('App\Models\Place','to_id');
    }
    /* ************************ morph ************************* */

    /* ************************ one to many ************************* */
    public function shipments()
    {
        return $this->hasMany('App\Models\Shipment','road_id');
    }
    /* ************************ many to many ************************* */
}
