<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'icon',
        'link',
        'is_published',
        'as_icon',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = [
        'resource_url',
        'seo_url',
        'as_icon',
    ];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/socials/'.$this->getKey());
    }
    public function getSeoUrlAttribute()
    {
        return url('/seo/socials/'.$this->getKey());
    }
    public function getAsIconAttribute(){
        return '<i class="fa '.$this['icon'].'" style="font-size: 32px;"></i>';
    }
}
