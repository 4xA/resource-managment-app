<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PDFResource extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'pdf_resources';

    protected $fillable = [
        'title'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection(config('media_collections.pdf'))
            ->singleFile();
    }
}
