<?php

namespace App\DTOs\Resources;

use App\Models\HTMLResource;
use Spatie\DataTransferObject\DataTransferObject;

class HTMLResourceDTO extends DataTransferObject implements ResourceDTOInterface
{
    public function __construct(
        public ?int $id = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $snippet = null,
    )
    {
    }

    public static function fromEloquent(HTMLResource $htmlResource): HTMLResourceDTO
    {
        $htmlResourceDto = new HTMLResourceDTO(
            id: $htmlResource->resource->id,
            title: $htmlResource->title,
            description: $htmlResource->description,
            snippet: $htmlResource->snippet,
        );

        return $htmlResourceDto;
    } 
}
