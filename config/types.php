<?php

use App\Enums\ResourceTypeEnum;
use App\Models\HTMLResource;
use App\Models\LinkResource;
use App\Models\PDFResource;

return [
    ResourceTypeEnum::LINK => LinkResource::class,
    ResourceTypeEnum::PDF => PDFResource::class,
    ResourceTypeEnum::HTML => HTMLResource::class,
];
