<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Job extends Model
{
use HasTranslations;
    protected $fillable = [
        'title',
        'is_published',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    public $translatable = [
        'title',
    ];

    protected $appends = [
        'resource_url',
        'seo_url',
    ];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/jobs/'.$this->getKey());
    }
    public function getSeoUrlAttribute()
    {
        return url('/seo/jobs/'.$this->getKey());
    }
    public function Applications()
    {
        return $this->hasMany(Application::class);
    }
}
