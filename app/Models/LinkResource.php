<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class LinkResource extends ResourceType
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'is_open_new_tab',
    ];

    protected $visible = [
        'resource_id',
        'title',
        'link',
        'is_open_new_tab',
        'type',
    ];

    protected $appends = [
        'resource_id',
        'type',
    ];
}
