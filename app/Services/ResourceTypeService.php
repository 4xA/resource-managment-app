<?php

namespace App\Services;

use App\DTOs\Resources\ResourceDTOInterface;
use App\Stratagies\Resources\ResourceStratagyInterface;
use Exception;

class ResourceTypeService
{
    private ?ResourceStratagyInterface $resourceStratagy = null;

    public function create(ResourceDTOInterface $resourceDto): ResourceDTOInterface
    {
        $this->validateStratagy();
        return $this->resourceStratagy->create($resourceDto);
    }

    public function retrieve(ResourceDTOInterface $resourceDto): ResourceDTOInterface
    {
        $this->validateStratagy();
        return $this->resourceStratagy->retrieve($resourceDto);
    }

    public function update(ResourceDTOInterface $resourceDto): ResourceDTOInterface
    {
        $this->validateStratagy();
        return $this->resourceStratagy->update($resourceDto);
    }

    public function delete(ResourceDTOInterface $resourceDto): bool
    {
        $this->validateStratagy();
        return $this->resourceStratagy->delete($resourceDto);
    }

    public function setStratagy(ResourceStratagyInterface $resourceStratagy)
    {
        $this->resourceStratagy = $resourceStratagy;
    }

    private function validateStratagy(): void
    {
        if (!isset($this->resourceStratagy)) {
            throw new Exception('Stratagy is not set.');
        }
    }
}
