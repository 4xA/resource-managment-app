<?php

namespace App\DTOs\Resources;

use App\Models\ResourceType;
use Spatie\DataTransferObject\DataTransferObject;

class LinkResourceDTO extends DataTransferObject implements ResourceDTOInterface
{
    public function __construct(
        public ?int $id = null,
        public ?string $title = null,
        public ?string $link = null,
        public ?bool $isOpenNewTab = null,
    )
    {
    }

    public static function fromEloquent(ResourceType $linkResource): LinkResourceDTO
    {
        $linkResourceDto = new LinkResourceDTO(
            id: $linkResource->resource->id,
            title: $linkResource->title,
            link: $linkResource->link,
            isOpenNewTab: $linkResource->is_open_new_tab,
        );

        return $linkResourceDto;
    } 
}
