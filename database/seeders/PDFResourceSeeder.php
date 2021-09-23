<?php

namespace Database\Seeders;

use App\Models\PDFResource;
use Illuminate\Database\Seeder;

class PDFResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PDFResource::factory(10)->create();
    }
}
