<?php

namespace Database\Seeders;

use App\Models\category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::factory(10)->create();

        \App\Models\category::factory()->create([
            'name' => 'Tegst',
            'slug' => 'tegvst-test',
        ]);
    }
}
