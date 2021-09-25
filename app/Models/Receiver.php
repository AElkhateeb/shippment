<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $fillable = [
        'fullname',
        'address',
        'phone',
        'phone_2',
        'city',
        'area',
        'location',
        'lng',
        'lat',
        'governorate',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/receivers/'.$this->getKey());
    }
    public function shipments()
    {
        return $this->hasMany('App\Models\Shipment','receiver_id');
    }
    public function wallet()
    {
        return $this->morphOne('App\Models\Wallet','belongs_to');
    }
    public function receiving()
    {
        return $this->morphOne('App\Models\Withdrawal','reason');
    }
}
