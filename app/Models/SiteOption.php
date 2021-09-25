<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteOption extends Model
{
    protected $fillable = [
        'weight_default',
        'weight_fee',
        'pickup',
        'pickup_fee',
        'todoor',
        'todoor_fee',
        'express',
        'express_fee',
        'breakable',
        'breakable_fee',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/site-options/'.$this->getKey());
    }
}
