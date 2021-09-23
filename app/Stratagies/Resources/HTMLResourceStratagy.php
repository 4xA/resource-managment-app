<?php

namespace App\Stratagies\Resources;

use App\DTOs\Resources\HTMLResourceDTO;
use App\DTOs\Resources\ResourceDTOInterface;
use App\Models\HTMLResource;
use InvalidArgumentException;

class HTMLResourceStratagy implements ResourceStratagyInterface
{
    public function create(ResourceDTOInterface $htmlResourceDto): HTMLResourceDTO
    {
        $htmlResource = HTMLResource::create([
            'title' => $htmlResourceDto->title,
            'description' => $htmlResourceDto->description,
            'snippet' => $htmlResourceDto->snippet,
        ]);

        return HTMLResourceDTO::fromEloquent($htmlResource);
    }

    public function retrieve(ResourceDTOInterface $htmlResourceDto): HTMLResourceDTO
    {
        $htmlResource = HTMLResource::find($htmlResourceDto->id);

        if (!isset($htmlResource)) {
            throw new InvalidArgumentException('Model does not exist');
        }

        return HTMLResourceDTO::fromEloquent($htmlResource);
    }

    public function update(ResourceDTOInterface $htmlResourceDto): HTMLResourceDTO
    {
        $htmlResource = HTMLResource::find($htmlResourceDto->id);

        if (!isset($htmlResource)) {
            throw new InvalidArgumentException('Model does not exist');
        }

        $htmlResource->update([
            'title' => $htmlResourceDto->title,
            'description' => $htmlResourceDto->description,
            'snippet' => $htmlResourceDto->snippet,
        ]);

        return HTMLResourceDTO::fromEloquent($htmlResource);
    }

    public function delete(ResourceDTOInterface $htmlResourceDto): bool
    {
        $htmlResource = HTMLResource::find($htmlResourceDto->id);

        if (!isset($htmlResource)) {
            return false;
        }

        $htmlResource->delete();

        return true;
    }
}
