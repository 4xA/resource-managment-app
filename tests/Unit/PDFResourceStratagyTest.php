<?php

namespace Tests\Unit;

use App\DTOs\Resources\PDFResourceDTO;
use App\Models\PDFResource;
use App\Stratagies\Resources\PdfResourceStratagy;
use SplFileObject;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFileExists;
use function PHPUnit\Framework\assertGreaterThan;
use function PHPUnit\Framework\assertTrue;

class PDFResourceStratagyTest extends TestCase
{
    public function test_create()
    {
        $title = 'Test Title';
        $file = new SplFileObject(storage_path() . '/app/test_files/example.pdf');

        assertGreaterThan(0, $file->getSize());

        $pdfResourceStratagy = new PdfResourceStratagy();
        $pdfResourceDto = $pdfResourceStratagy->create(new PDFResourceDTO(
            title: $title,
            fileName: $file->getFilename(),
            fileBase64: base64_encode($file->fread($file->getSize())),
        ));

        $pdfResource = PDFResource::find($pdfResourceDto->id);

        assertEquals($title, $pdfResource->title);
        assertFileExists($pdfResource->getFirstMedia(config('media_collections.pdf'))->getPath());
    }

    public function test_retrieve()
    {
        $pdfResource = PDFResource::factory(1)->create()->first();

        $pdfResourceStratagy = new PdfResourceStratagy();
        $pdfResourceDto = $pdfResourceStratagy->retrieve(new PDFResourceDTO(
            id: $pdfResource->id
        ));

        assertEquals($pdfResource->title, $pdfResourceDto->title);
    }

    public function test_update()
    {
        $pdfResource = PDFResource::factory(1)->create()->first();

        $newTitle = 'New Title';

        $pdfResourceStratagy = new PdfResourceStratagy();
        $pdfResourceDto = $pdfResourceStratagy->update(new PDFResourceDTO(
            id: $pdfResource->id,
            title: $newTitle
        ));

        $pdfResource = PDFResource::find($pdfResourceDto->id);

        assertEquals($newTitle, $pdfResource->title);
    }

    public function test_delete()
    {
        $pdfResource = PDFResource::factory(1)->create()->first();

        $pdfResourceStratagy = new PdfResourceStratagy();
        $pdfResourceStratagy->delete(new PDFResourceDTO(
            id: $pdfResource->id
        ));

        assertTrue($pdfResource->exists());
    }
}
