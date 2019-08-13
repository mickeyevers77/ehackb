<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Sponsor extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'link',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(90)
            ->height(60)
            ->optimize();

        $this->addMediaConversion('home')
            ->width(180)
            ->height(120)
            ->optimize();
    }

    public function getImage($conversion = '')
    {
        if ($this->getMedia('image')->first() !== null) {
            return $this->getMedia('image')->first()->getUrl($conversion);
        }

        return null;
    }
}
