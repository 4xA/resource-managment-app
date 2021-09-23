<?php

namespace App\Stratagies\Resources;

use App\DTOs\Resources\LinkResourceDTO;
use App\DTOs\Resources\ResourceDTOInterface;
use App\Models\LinkResource;
use InvalidArgumentException;

class LinkResourceStratagy implements ResourceStratagyInterface
{
    public function create(ResourceDTOInterface $linkResourceDto): LinkResourceDTO
    {
        $linkResource = LinkResource::create([
            'title' => $linkResourceDto->title,
            'link' => $linkResourceDto->link,
            'is_open_new_tab' => $linkResourceDto->isOpenNewTab,
        ]);

        return LinkResourceDTO::fromEloquent($linkResource);
    }

    public function retrieve(ResourceDTOInterface $linkResourceDto): LinkResourceDTO
    {
        $linkResource = LinkResource::find($linkResourceDto->id);

        if (!isset($linkResource)) {
            throw new InvalidArgumentException('Model does not exist');
        }

        return LinkResourceDTO::fromEloquent($linkResource);
    }

    public function update(ResourceDTOInterface $linkResourceDto): LinkResourceDTO
    {
        $linkResource = LinkResource::find($linkResourceDto->id);

        if (!isset($linkResource)) {
            throw new InvalidArgumentException('Model does not exist');
        }

        $linkResource->update([
            'title' => $linkResourceDto->title,
            'link' => $linkResourceDto->link,
            'is_open_new_tab' => $linkResourceDto->isOpenNewTab,
        ]);

        return LinkResourceDTO::fromEloquent($linkResource);
    }

    public function delete(ResourceDTOInterface $linkResourceDto): bool
    {
        $linkResource = LinkResource::find($linkResourceDto->id);

        if (!isset($linkResource)) {
            return false;
        }

        $linkResource->delete();
        
        return true;
    }
}
