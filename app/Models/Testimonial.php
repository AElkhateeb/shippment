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

class Testimonial extends Model implements  HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use HasTranslations;

    protected $fillable = [
        'title',
        'job',
        'text',
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
        'job',
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
        return url('/admin/testimonials/'.$this->getKey());
    }
    public function getSeoUrlAttribute()
    {
        return url('/seo/testimonials/'.$this->getKey());
    }
    public function getMediaUrlAttribute(){
        $mediaItems = $this->getMedia('testimonial');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/1920x1080'; ;
        }
        return asset($publicUrl) ;

    }
    public function getAsImgAttribute(){
        $mediaItems = $this->getMedia('testimonial');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/1920x1080'; ;
        }
        return '<img  style="width: 180px; height: 90px;" src="'.asset($publicUrl).'">' ;

    }
    public function getMediaColl(){
        $mediaItems = $this->getMedia('testimonial');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/1920x1080'; ;
        }
        return $publicUrl ;

    }
    public function registerMediaCollections(): void {
        $this->addMediaCollection('testimonial')
            ->disk('media')
            ->maxNumberOfFiles(1)
            ->accepts('image/*');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('testimonials')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('testimonial');
        $this->autoRegisterThumb200();
    }

}
