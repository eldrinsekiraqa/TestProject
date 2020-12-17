<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articles::factory()
            ->times(20)
            ->create();
    }
}
