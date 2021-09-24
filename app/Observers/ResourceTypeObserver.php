<?php

namespace App\Observers;

use App\Models\Resource;
use App\Models\ResourceType;

class ResourceTypeObserver
{
    /**
     * Handle the ResourceType "created" event.
     *
     * @param  \App\Models\ResourceType  $resourceType
     * @return void
     */
    public function created(ResourceType $resourceType)
    {
        $resource = Resource::create();
        $resourceType->resource()->save($resource);
    }

    /**
     * Handle the ResourceType "force deleting" event.
     *
     * @param  \App\Models\ResourceType  $resourceType
     * @return void
     */
    public function forceDeleting(ResourceType $resourceType)
    {
        $resourceType->resource()->delete();
    }
}
