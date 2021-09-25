<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Branch extends Model
{
use HasTranslations;
    protected $fillable = [
        'location',
        'lng',
        'lat',
        'name',
        'governorate',
        'is_published',
        'manger',
        'agent',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    public $translatable = [
        'name',
        'governorate',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/branches/'.$this->getKey());
    }
    /* ************************ references ************************* */
    /* ************************ many to one ************************* */
    public function MangerAdmin() {
        return $this->belongsTo('App\Models\Users\MangerAdmin','manger');
    }
    public function placeTo() {
        return $this->belongsTo('App\Models\Users\AgentAdmin','agent');
    }
    /* ************************ morph ************************* */
    public function wallet()
    {
        return $this->morphOne('App\Models\Wallet','belongs_to');
    }
    /* ************************ one to many ************************* */
    public function delivery()
    {
        return $this->hasMany('App\Models\Shipment','branch_from_id');
    }
    public function reception()
    {
        return $this->hasMany('App\Models\Shipment','branch_to_id');
    }
    public function places()
    {
        return $this->hasMany('App\Models\Place','branch_id');
    }
    public function movements()
    {
        return $this->hasMany('App\Models\Movement','branch_id');
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
    /* ************************ many to many ************************* */
    public function employees()
    {
        return $this -> belongsToMany('App\Models\EmployeeAdmin','employee_branches','employee_id','branch_id','id','id');

    }
}
