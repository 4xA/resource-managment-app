<?php

namespace App\Stratagies\Resources;

use App\DTOs\Resources\LinkResourceDTO;
use App\DTOs\Resources\ResourceDTOInterface;

class LinkResourceStratagy implements ResourceStratagyInterface
{
    public function create(ResourceDTOInterface $linkResourceDto): LinkResourceDTO
    {
        return new LinkResourceDTO();
    }

    public function retrieve(ResourceDTOInterface $linkResourceDto): LinkResourceDTO
    {
        return new LinkResourceDTO();
    }

    public function update(ResourceDTOInterface $linkResourceDto): LinkResourceDTO
    {
        return new LinkResourceDTO();
    }

    public function delete(ResourceDTOInterface $htmlResourceDto): bool
    {
        return true;
    }
}
