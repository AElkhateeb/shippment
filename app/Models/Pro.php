<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Pro extends Model
{
use HasTranslations;
    protected $fillable = [
        'icon',
        'title',
        'text',
        'as_icon',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    public $translatable = [
        'title',
        'text',

    ];

    protected $appends = [
        'resource_url',
        'seo_url',
        'as_icon',
    ];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pros/'.$this->getKey());
    }
    public function getSeoUrlAttribute()
    {
        return url('/seo/pros/'.$this->getKey());
    }
    public function getAsIconAttribute(){
       return '<i class="fa '.$this['icon'].'" style="font-size: 32px;"></i>';
    }
}
