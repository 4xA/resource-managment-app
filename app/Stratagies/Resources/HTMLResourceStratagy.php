<?php

namespace App\Stratagies\Resources;

use App\DTOs\Resources\HTMLResourceDTO;
use App\DTOs\Resources\ResourceDTOInterface;

class HTMLResourceStratagy implements ResourceStratagyInterface
{
    public function create(ResourceDTOInterface $pdfResourceDto): HTMLResourceDTO
    {
        return new HTMLResourceDTO();
    }

    public function retrieve(ResourceDTOInterface $pdfResourceDto): HTMLResourceDTO
    {
        return new HTMLResourceDTO();
    }

    public function update(ResourceDTOInterface $pdfResourceDto): HTMLResourceDTO
    {
        return new HTMLResourceDTO();
    }

    public function delete(ResourceDTOInterface $pdfResourceDto): bool
    {
        return true;
    }
}
