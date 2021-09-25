<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Contact extends Model
{
use HasTranslations;
    protected $fillable = [
        'icon',
        'title',
        'text',
        'is_published',
        'branch_id',
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
        return url('/admin/contacts/'.$this->getKey());
    }
    public function getSeoUrlAttribute()
    {
        return url('/seo/contacts/'.$this->getKey());
    }
    public function getAsIconAttribute(){
        return '<i class="fa '.$this['icon'].'" style="font-size: 32px;"></i>';
    }
    /* ************************ realation ************************* */
    public function branch() {
        return $this->belongsTo(Branch::class);
    }
}
