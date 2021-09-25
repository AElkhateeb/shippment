<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = [
        'price',
        'reason_type',
        'reason_id',
        'made_type',
        'made_id',
        'in_out',
        'enabled',
        'from_id',
        'to_id',
        'payment_method_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/withdrawals/'.$this->getKey());
    }
    /* ************************ references ************************* */
    /* ************************ many to one ************************* */
    public function paymentMethod() {
        return $this->belongsTo('App\Models\PaymentMethod','payment_method_id');
    }
    public function walletFrom() {
        return $this->belongsTo('App\Models\Wallet','from_id');
    }
    public function walletTo() {
        return $this->belongsTo('App\Models\Wallet','to_id');
    }

    /* ************************ morph ************************* */
    public function reason()
    {
        return $this->morphTo('reason');
    }
    public function made()
    {
        return $this->morphTo('made');
    }
    /* ************************ one to many ************************* */


    /* ************************ many to many ************************* */

}
