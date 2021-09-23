<?php

namespace Tests\Unit;

use App\DTOs\Resources\HTMLResourceDTO;
use App\Models\HTMLResource;
use App\Stratagies\Resources\HTMLResourceStratagy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;

class HTMLResourceStratagyTest extends TestCase
{
    use RefreshDatabase;

    public function test_create()
    {
        $title = 'Test Title';
        $description = 'Test description.';
        $snippet = '<html></html>';

        $htmlResourceStratagy = new HTMLResourceStratagy();
        $htmlResourceDto = $htmlResourceStratagy->create(new HTMLResourceDTO(
            title: $title,
            description: $description,
            snippet: $snippet
        ));

        $htmlResource = HTMLResource::find($htmlResourceDto->id);

        assertEquals($title, $htmlResource->title);
        assertEquals($description, $htmlResource->description);
        assertEquals($snippet, $htmlResource->snippet);
    }

    public function test_retrieve()
    {
        $htmlResource = HTMLResource::factory(1)->create()->first();

        $htmlResourceStratagy = new HTMLResourceStratagy();
        $htmlResourceDto = $htmlResourceStratagy->retrieve(new HTMLResourceDTO(
            id: $htmlResource->id
        ));

        assertEquals($htmlResource->title, $htmlResourceDto->title);
    }

    public function test_update()
    {
        $htmlResource = HTMLResource::factory(1)->create()->first();

        $newTitle = 'New Title';

        $htmlResourceStratagy = new HTMLResourceStratagy();
        $htmlResourceDto = $htmlResourceStratagy->update(new HTMLResourceDTO(
            title: $newTitle
        ));

        $htmlResource = HTMLResource::find($htmlResourceDto->id);

        assertEquals($newTitle, $htmlResource->title);
    }

    public function test_delete()
    {
        $htmlResource = HTMLResource::factory(1)->create()->first();

        $htmlResourceStratagy = new HTMLResourceStratagy();
        $htmlResourceStratagy->delete(new HTMLResourceDTO(
            id: $htmlResource->id
        ));

        assertFalse($htmlResource->exists());
    }
}
