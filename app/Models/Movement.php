<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [
        'reason',
        'shipment_id',
        'method_id',
        'employee_type',
        'employee_id',
        'branch_id',
        'method_parent_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/movements/'.$this->getKey());
    }
    /* ************************ references ************************* */
    /* ************************ many to one  ************************* */
    public function shipment() {
        return $this->belongsTo('App\Models\Shipment','shipment_id');
    }
    public function method() {
        return $this->belongsTo('App\Models\MovementMethod','method_id');
    }
    public function parent() {
        return $this->belongsTo('App\Models\MovementMethod','method_parent_id');
    }
    public function branch() {
        return $this->belongsTo('App\Models\Branch','branch_id');
    }
    /* ************************ morph ************************* */
    public function employee()
    {
        return $this->morphTo('employee');
    }
    /* ************************ one to many ************************* */
    /* ************************ many to many ************************* */

}
