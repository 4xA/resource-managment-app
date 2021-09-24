<?php

namespace App\Services;

use App\DTOs\Resources\HTMLResourceDTO;
use App\DTOs\Resources\LinkResourceDTO;
use App\DTOs\Resources\PDFResourceDTO;
use App\Enums\ResourceTypeEnum;
use App\Models\Resource;
use App\Stratagies\Resources\HTMLResourceStratagy;
use App\Stratagies\Resources\LinkResourceStratagy;
use App\Stratagies\Resources\PDFResourceStratagy;
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

    public function all(): array
    {
        $resources = [];

        foreach (Resource::with('resourcable')->get() as $resource) {
            if (!isset($resource->resourcable)) {
                continue;
            }
            array_push($resources, $resource->resourcable->toArray());
        }

        return $resources;
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

        switch ($collection->get('type')) {
            case ResourceTypeEnum::LINK:
                $resourceStratagy = new LinkResourceStratagy();
                $resourceDto = new LinkResourceDTO(
                    id: $collection->get('id'),
                    title: $collection->get('title'),
                    link: $collection->get('link'),
                    isOpenNewTab: $collection->get('is_open_new_tab')
                );
                break;
            
            case ResourceTypeEnum::PDF:
                $resourceStratagy = new PDFResourceStratagy();
                $resourceDto = new PDFResourceDTO(
                    id: $collection->get('id'),
                    title: $collection->get('title'),
                    fileName: $collection->get('file') !== null ? $collection->get('file')->getClientOriginalName() : null,
                    fileBase64: $collection->get('file') !== null ? base64_encode($collection->get('file')->get()): null,
                );
                break;

            case ResourceTypeEnum::HTML:
                $resourceStratagy = new HTMLResourceStratagy();
                $resourceDto = new HTMLResourceDTO(
                    id: $collection->get('id'),
                    title: $collection->get('title'),
                    description: $collection->get('description'),
                    snippet: $collection->get('snippet'),
                );
                break;
            
            default:
                throw new InvalidArgumentException('Type is not supported');
                break;
        }
            
        return [$resourceStratagy, $resourceDto];
    }
}
