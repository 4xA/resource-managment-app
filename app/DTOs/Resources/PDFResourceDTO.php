<?php

namespace App\DTOs\Resources;

use App\Enums\ResourceTypeEnum;
use App\Models\PDFResource;
use App\Models\ResourceType;
use Spatie\DataTransferObject\DataTransferObject;

class PDFResourceDTO extends DataTransferObject implements ResourceDTOInterface
{
    public function __construct(
        public ?int $id = null,
        public ?int $resource_id = null,
        public ?string $title = null,
        public ?string $fileName = null,
        public ?string $fileBase64 = null,
        public ?string $url = null,
        public ?string $type = null,
    )
    {
    }

    public static function fromEloquent(ResourceType $pdfResource): PDFResourceDTO
    {
        $pdfResourceDto = new PDFResourceDTO(
            id: $pdfResource->id,
            resource_id: $pdfResource->resource->id,
            title: $pdfResource->title,
            url: $pdfResource->getFirstMediaUrl(config('media_collections.pdf')),
            type: ResourceTypeEnum::PDF,
        );

        return $pdfResourceDto;
    } 
}
