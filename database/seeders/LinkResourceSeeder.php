<?php

namespace Database\Seeders;

use App\Models\LinkResource;
use Illuminate\Database\Seeder;

class LinkResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LinkResource::factory(10)->create();
    }
}
