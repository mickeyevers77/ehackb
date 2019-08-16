<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Event extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public $dates = [
        'starts_at',
        'ends_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'speaker',
        'short_description',
        'long_description',
        'slots',
        'starts_at',
        'ends_at',
    ];

    public function starts_at_date_time_local()
    {
        return $this->starts_at ? $this->starts_at->toDateTimeLocalString() : null;
    }

    public function ends_at_date_time_local()
    {
        return $this->ends_at ? $this->ends_at->toDateTimeLocalString() : null;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function availableSlots()
    {
        return $this->slots - $this->users()->count();
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
