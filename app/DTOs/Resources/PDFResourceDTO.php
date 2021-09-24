<?php

namespace App\DTOs\Resources;

use App\Models\PDFResource;
use Spatie\DataTransferObject\DataTransferObject;

class PDFResourceDTO extends DataTransferObject implements ResourceDTOInterface
{
    public function __construct(
        public ?int $id = null,
        public ?string $title = null,
        public ?string $fileName = null,
        public ?string $fileBase64 = null,
        public ?string $path = null,
    )
    {
    }

    public static function fromEloquent(PDFResource $pdfResource): PDFResourceDTO
    {
        $pdfResourceDto = new PDFResourceDTO(
            id: $pdfResource->resource->id,
            title: $pdfResource->title,
            path: $pdfResource->getFirstMediaUrl(config('media_collections.pdf'))
        );

        return $pdfResourceDto;
    } 
}
