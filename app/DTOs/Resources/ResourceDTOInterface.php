<?php

namespace App\DTOs\Resources;

use App\Models\ResourceType;

interface ResourceDTOInterface {
    public static function fromEloquent(ResourceType $model): ResourceDTOInterface;
}
