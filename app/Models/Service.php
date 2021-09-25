<?php

namespace App\Models;

use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements  HasMedia
{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use HasTranslations;
    protected $fillable = [
        'title',
        'text',
        'body',
        'is_published',
        'media_url',
        'as_img',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    public $translatable = [
        'title',
        'text',
        'body',

    ];

    protected $appends = [
        'resource_url',
        'seo_url',
        'media_url',
        'as_img'
    ];
    protected $hidden=[
        'created_at',
        'updated_at',
        'media'
    ];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/services/'.$this->getKey());
    }
    public function getSeoUrlAttribute()
    {
        return url('/seo/services/'.$this->getKey());
    }
    public function getMediaUrlAttribute(){
        $mediaItems = $this->getMedia('service');
       // $publicUrl = $mediaItems[0]->getUrl();

        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/570x255';
        }
        return asset($publicUrl) ;
    }
    public function getAsImgAttribute(){
        $mediaItems = $this->getMedia('service');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/570x255';
        }
        return '<img  style="width: 180px; height: 90px;" src="'.asset($publicUrl).'">' ;

    }
    public function getMediaColl(){
        $mediaItems = $this->getMedia('service');
        //$publicUrl = $mediaItems[0]->getUrl();
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/570x255'; ;
        }
        return $publicUrl ;

    }
    public function registerMediaCollections(): void {
        $this->addMediaCollection('service')
            ->disk('media')
            ->maxNumberOfFiles(1)
            ->accepts('image/*');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('services')
            ->width(570)
            ->height(255)
            ->performOnCollections('service');
        $this->autoRegisterThumb200();
    }
}
