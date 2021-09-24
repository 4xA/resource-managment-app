<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PDFResource extends ResourceType implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'pdf_resources';

    protected $fillable = [
        'title'
    ];

    protected $visible = [
        'resource_id',
        'title',
        'url'
    ];

    protected $appends = [
        'url',
        'resource_id',
    ];

    public function getUrlAttribute()
    {
        $url = $this->getFirstMediaUrl(config('media_collections.pdf'));

        if (!isset($url)) {
            return null;
        }

        return $url;
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection(config('media_collections.pdf'))
            ->singleFile();
    }
}
