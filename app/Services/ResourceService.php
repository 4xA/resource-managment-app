<?php

namespace App\Services;

use App\DTOs\Resources\LinkResourceDTO;
use App\Models\Resource;
use App\Stratagies\Resources\LinkResourceStratagy;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class ResourceService
{
    public function __construct(
        public ResourceTypeService $resourceTypeService
    )
    {
        //
    }

    public function create(Collection $collection): array
    {
        list($resourceStratagy, $resourceDto) = $this->getStratagyAndDto($collection);

        $this->resourceTypeService->setStratagy($resourceStratagy);

        return $this->resourceTypeService->create($resourceDto)->toArray();
    }

    public function retrieve($id): array
    {
        $resource = Resource::find($id);

        if (!isset($resource)) {
            throw new InvalidArgumentException('Model not found');
        }

        list($resourceStratagy, $resourceDto) = $this->getStratagyAndDto(collect(
            [
                'id' => $resource->resourcable->id,
                'type' => array_flip(config('types'))[$resource->resourcable_type],
            ]
        ));

        $this->resourceTypeService->setStratagy($resourceStratagy);

        return $this->resourceTypeService->retrieve($resourceDto)->toArray();
    }

    public function update(Collection $collection, $id): array
    {
        $resource = Resource::find($id);

        if (!isset($resource)) {
            throw new InvalidArgumentException('Model not found');
        }

        list($resourceStratagy, $resourceDto) = $this->getStratagyAndDto(collect(
            array_merge(
                [
                    'id' => $resource->resourcable->id,
                    'type' => array_flip(config('types'))[$resource->resourcable_type],
                ],
                $collection->toArray()
            )
        ));

        $this->resourceTypeService->setStratagy($resourceStratagy);

        return $this->resourceTypeService->update($resourceDto)->toArray();       
    }

    public function delete($id): bool
    {
        $resource = Resource::find($id);

        if (!isset($resource)) {
            return false;
        }

        list($resourceStratagy, $resourceDto) = $this->getStratagyAndDto(collect(
            [
                'id' => $resource->resourcable->id,
                'type' => array_flip(config('types'))[$resource->resourcable_type],
            ]
        ));

        $this->resourceTypeService->setStratagy($resourceStratagy);

        return $this->resourceTypeService->delete($resourceDto);
    }


    private function getStratagyAndDto(Collection $collection): array
    {
        $resourceStratagy = null;
        $resourceDto = null;

        // TODO: Move this magic string to enum
        if ($collection->get('type') === 'link') {
            $resourceStratagy = new LinkResourceStratagy();
            $resourceDto = new LinkResourceDTO(
                id: $collection->get('id'),
                title: $collection->get('title'),
                link: $collection->get('link'),
                isOpenNewTab: $collection->get('is_open_new_tab')
            );
        }

        return [$resourceStratagy, $resourceDto];
    }
}
