<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class MovementMethod extends Model
{
use HasTranslations;
    protected $fillable = [
        'method',
        'parent_id',

    ];


    protected $dates = [

    ];
    // these attributes are translatable
    public $translatable = [
        'method',

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/movement-methods/'.$this->getKey());
    }
    /* ************************ references ************************* */
    /* ************************ many to one ************************* */
    public function parent() {
        return $this->belongsTo('App\Models\MovementMethod','parent_id');
    }

    /* ************************ morph ************************* */

    /* ************************ one to many ************************* */

    public function children() {
        return $this->hasMany('App\Models\MovementMethod','parent_id');
    }

    /* ************************ many to many ************************* */
    public function movementChildren() {
        return $this -> belongsToMany('App\Models\MovementMethod','movements','movement_method_id','shipment_id','id','id');
    }
    public function movementParents() {
        return $this -> belongsToMany('App\Models\MovementMethod','movements','method_parent_id','shipment_id','id','id');

    }


}
