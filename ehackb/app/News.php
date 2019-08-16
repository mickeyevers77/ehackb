<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class News extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public $dates = [
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'published_at',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function published_at_date_time_local()
    {
        return $this->published_at ? $this->published_at->toDateTimeLocalString() : null;
    }

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

        $this->addMediaConversion('detail')
            ->width(960)
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
