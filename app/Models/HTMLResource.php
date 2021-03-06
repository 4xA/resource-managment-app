<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class HTMLResource extends ResourceType
{
    use HasFactory;

    protected $table = 'html_resources';

    protected $fillable = [
        'title',
        'description',
        'snippet',
    ];

    protected $visible = [
        'resource_id',
        'title',
        'description',
        'snippet',
        'type',
    ];

    protected $appends = [
        'resource_id',
        'type',
    ];
}
