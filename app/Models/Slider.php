<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;


class Slider extends Model implements  HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use HasTranslations;
    protected $table = "sliders";
    protected $fillable = [
        'title',
        'sub_title',
        'text',
        'activated',
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
        'sub_title',
        'text',

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
        return url('/admin/sliders/'.$this->getKey());
    }
    public function getSeoUrlAttribute()
    {
        return url('/seo/sliders/'.$this->getKey());
    }
    public function getMediaUrlAttribute(){
        $mediaItems = $this->getMedia('slider');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/1920x1080'; ;
        }
        return asset($publicUrl) ;

    }
    public function getAsImgAttribute(){
        $mediaItems = $this->getMedia('slider');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/1920x1080'; ;
        }
        return '<img  style="width: 180px; height: 90px;" src="'.asset($publicUrl).'">' ;

    }
    public function getMediaColl(){
        $mediaItems = $this->getMedia('slider');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/1920x1236'; ;
        }
        return $publicUrl ;

    }
    public function registerMediaCollections(): void {
        $this->addMediaCollection('slider')
            ->disk('media')
            ->maxNumberOfFiles(1)
            ->accepts('image/*');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('sliders')
            ->width(1920)
            ->height(1236)
            ->performOnCollections('slider');
        $this->autoRegisterThumb200();
    }

}
