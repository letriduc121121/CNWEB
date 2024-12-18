<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\A1class;

class A1classSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        A1class::factory()->count(20)->create();
    }
}
