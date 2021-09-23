<?php

namespace Tests\Unit;

use App\DTOs\Resources\LinkResourceDTO;
use App\Models\LinkResource;
use App\Stratagies\Resources\LinkResourceStratagy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;

class LinkResourceStratagyTest extends TestCase
{
    use RefreshDatabase;

    public function test_create()
    {
        $title = 'Test Title';
        $link = 'https://example.org';
        $isOpenNewTab = true;

        $linkResourceStratagy = new LinkResourceStratagy();
        $linkResourceDto = $linkResourceStratagy->create(new LinkResourceDTO(
            title: $title,
            link: $link,
            isOpenNewTab: $isOpenNewTab,
        ));

        $linkResource = LinkResource::find($linkResourceDto->id);

        assertEquals($title, $linkResource->title);
        assertEquals($link, $linkResource->link);
        assertEquals($isOpenNewTab, $linkResource->is_open_new_tab);
    }

    public function test_retrieve()
    {
        $linkResource = LinkResource::factory(1)->create()->first();

        $linkResourceStratagy = new LinkResourceStratagy();
        $linkResourceDto = $linkResourceStratagy->retrieve(new LinkResourceDTO(
            id: $linkResource->id
        ));

        assertEquals($linkResource->title, $linkResourceDto->title);
    }

    public function test_update()
    {
        $linkResource = LinkResource::factory(1)->create()->first();

        $newLink = "https://example.org";

        $linkResourceStratagy = new LinkResourceStratagy();
        $linkResourceDto = $linkResourceStratagy->retrieve(new LinkResourceDTO(
            id: $linkResource->id,
            link: $newLink,
        ));

 
        $linkResource = LinkResource::find($linkResourceDto->id);

        assertEquals($newLink, $linkResource->link);
    }

    public function test_delete()
    {
        $linkResource = LinkResource::factory(1)->create()->first();

        $linkResourceStratagy = new LinkResourceStratagy();
        $linkResourceStratagy->retrieve(new LinkResourceDTO(
            id: $linkResource->id,
        ));

        assertFalse($linkResource->exists());
    }
}
