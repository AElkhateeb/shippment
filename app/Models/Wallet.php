<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'money',
        'belongs_to_type',
        'belongs_to_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/wallets/'.$this->getKey());
    }
    /* ************************ references ************************* */
    /* ************************ many to one ************************* */
    public function pays() {
        return $this->belongsTo('App\Models\Withdrawal','from_id');
    }
    public function receives() {
        return $this->belongsTo('App\Models\Withdrawal','to_id');
    }

    /* ************************ morph ************************* */
    public function belongsFor()
    {
        return $this->morphTo('belongs_to');
    }

    /* ************************ one to many ************************* */


    /* ************************ many to many ************************* */

}
