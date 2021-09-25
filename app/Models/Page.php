<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements  HasMedia
{

    use \Brackets\Media\HasMedia\ProcessMediaTrait;
    use \Brackets\Media\HasMedia\AutoProcessMediaTrait;
    use \Brackets\Media\HasMedia\HasMediaCollectionsTrait;
    use \Brackets\Media\HasMedia\HasMediaThumbsTrait;
    use HasTranslations;
    protected $fillable = [
        'title',
        'description',
        'h1',
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
        'description',
        'h1',

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
        return url('/admin/pages/'.$this->getKey());
    }
    public function getSeoUrlAttribute()
    {
        return url('/seo/pages/'.$this->getKey());
    }
    public function getMediaUrlAttribute(){
        $mediaItems = $this->getMedia('page');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/1920x1080'; ;
        }
        return asset($publicUrl) ;

    }
    public function getAsImgAttribute(){
        $mediaItems = $this->getMedia('page');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/1920x1080'; ;
        }
        return '<img  style="width: 180px; height: 90px;" src="'.asset($publicUrl).'">' ;

    }
    public function getMediaColl(){
        $mediaItems = $this->getMedia('page');
        if(isset($mediaItems[0])){
            $publicUrl = $mediaItems[0]->getUrl();

        }else{

            $publicUrl ='https://via.placeholder.com/1920x1080'; ;
        }
        return $publicUrl ;

    }
    public function registerMediaCollections(): void {
        $this->addMediaCollection('page')
            ->disk('media')
            ->maxNumberOfFiles(1)
            ->accepts('image/*');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('pages')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('page');
        $this->autoRegisterThumb200();
    }
}
