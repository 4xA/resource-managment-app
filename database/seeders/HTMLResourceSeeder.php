<?php

namespace Database\Seeders;

use App\Models\HTMLResource;
use Illuminate\Database\Seeder;

class HTMLResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HTMLResource::factory(10)->create();
    }
}
