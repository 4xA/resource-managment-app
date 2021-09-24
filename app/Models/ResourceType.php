<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class ResourceType extends Model
{
    public function resource(): MorphOne
    {
        return $this->morphOne(Resource::class, 'resourcable');
    }
}
