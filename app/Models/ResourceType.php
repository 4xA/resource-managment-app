<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceType extends Model
{
    use SoftDeletes;

    public function resource(): MorphOne
    {
        return $this->morphOne(Resource::class, 'resourcable');
    }

    public function getResourceIdAttribute()
    {
        return $this->resource->id;
    }

    public function getTypeAttribute()
    {
        return array_flip(config('types'))[get_called_class()];
    }
}
