<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'fullname',
        'job_id',
        'bday',
        'male',
        'military',
        'email',
        'phone',
        'phone_2',
        'city',
        'area',
        'education',
        'experience',
        'sex',


    ];


    protected $dates = [
        'bday',
        'created_at',
        'updated_at',

    ];

    protected $appends = [
        'resource_url',
        'seo_url',
        'sex',
    ];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/applications/'.$this->getKey());
    }
    public function getSeoUrlAttribute()
    {
        return url('/seo/applications/'.$this->getKey());
    }
    public function getSexAttribute(){
        return ($this['male']==1)? __('front.career_male') : __('front.career_female');
    }
    /* ************************ relation ************************* */
    public function Job() {
        return $this->belongsTo(Job::class);
    }

}
