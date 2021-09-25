<?php

namespace App\DTOs\Resources;

use App\Enums\ResourceTypeEnum;
use App\Models\ResourceType;
use Spatie\DataTransferObject\DataTransferObject;

class LinkResourceDTO extends DataTransferObject implements ResourceDTOInterface
{
    public function __construct(
        public ?int $id = null,
        public ?int $resource_id = null,
        public ?string $title = null,
        public ?string $link = null,
        public ?bool $is_open_new_tab = null,
        public ?string $type = null,
    )
    {
    }

    public static function fromEloquent(ResourceType $linkResource): LinkResourceDTO
    {
        $linkResourceDto = new LinkResourceDTO(
            id: $linkResource->id,
            resource_id: $linkResource->resource->id,
            title: $linkResource->title,
            link: $linkResource->link,
            is_open_new_tab: $linkResource->is_open_new_tab,
            type: ResourceTypeEnum::LINK,
        );

        return $linkResourceDto;
    } 
}
