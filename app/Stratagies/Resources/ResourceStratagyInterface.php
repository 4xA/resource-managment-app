<?php

namespace App\Stratagies\Resources;

use App\DTOs\Resources\ResourceDTOInterface;

interface ResourceStratagyInterface
{
    public function create(ResourceDTOInterface $resourceDto): ResourceDTOInterface;

    public function retrieve(ResourceDTOInterface $resourceDto): ResourceDTOInterface;

    public function update(ResourceDTOInterface $resourceDto): ResourceDTOInterface;

    public function delete(ResourceDTOInterface $resourceDto): bool;
}