<?php

namespace App\DTOs\Resources;

use App\Enums\ResourceTypeEnum;
use App\Models\ResourceType;
use Spatie\DataTransferObject\DataTransferObject;

class HTMLResourceDTO extends DataTransferObject implements ResourceDTOInterface
{
    public function __construct(
        public ?int $id = null,
        public ?int $resource_id = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $snippet = null,
        public ?string $type = null,
    )
    {
    }

    public static function fromEloquent(ResourceType $htmlResource): HTMLResourceDTO
    {
        $htmlResourceDto = new HTMLResourceDTO(
            id: $htmlResource->id,
            resource_id: $htmlResource->resource->id,
            title: $htmlResource->title,
            description: $htmlResource->description,
            snippet: $htmlResource->snippet,
            type: ResourceTypeEnum::HTML,
        );

        return $htmlResourceDto;
    } 
}
