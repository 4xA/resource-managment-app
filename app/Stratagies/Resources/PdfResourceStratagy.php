<?php

namespace App\Stratagies\Resources;

use App\DTOs\Resources\PDFResourceDTO;
use App\DTOs\Resources\ResourceDTOInterface;
use App\Models\PDFResource;
use InvalidArgumentException;

class PdfResourceStratagy implements ResourceStratagyInterface
{
    public function create(ResourceDTOInterface $pdfResourceDto): PDFResourceDTO
    {
        $pdfResource = PDFResource::create([
            'title' => $pdfResourceDto->title
        ]);
        $pdfResource
            ->addMediaFromBase64($pdfResourceDto->fileBase64)
            ->usingFileName($pdfResourceDto->fileName)
            ->toMediaCollection(config('media_collections.pdf'));

        return new PDFResourceDTO(
            id: $pdfResource->id,
            title: $pdfResource->title,
            path: $pdfResource->getFirstMediaUrl(config('media_collections.pdf')),
        );
    }

    public function retrieve(ResourceDTOInterface $pdfResourceDto): PDFResourceDTO
    {
        return PDFResourceDTO::fromEloquent(
            PDFResource::find($pdfResourceDto->id)
        );
    }

    public function update(ResourceDTOInterface $pdfResourceDto): PDFResourceDTO
    {
        $pdfResource = PDFResource::find($pdfResourceDto->id);

        if (!isset($pdfResource)) {
            throw new InvalidArgumentException('Model does not exist');
        }

        $pdfResource->update([
            'title' => $pdfResourceDto->title
        ]);

        if ($pdfResourceDto->fileBase64) {
            $pdfResource
                ->addMediaFromBase64($pdfResourceDto->fileBase64)
                ->usingFileName($pdfResourceDto->fileName)
                ->toMediaCollection(config('media_collections.pdf'));
        } 

        return PDFResourceDTO::fromEloquent(
            $pdfResource
        );
    }

    public function delete(ResourceDTOInterface $pdfResourceDto): bool
    {
        $pdfResource = PDFResource::find($pdfResourceDto->id);

        if (!isset($pdfResource)) {
            return false;
        }

        $pdfResource->delete();

        return true;
    }
}
