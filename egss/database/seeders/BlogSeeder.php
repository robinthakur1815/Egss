<?php

namespace Database\Seeders;

use App\Models\blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,20) as $index) {
            blog::create([
                'title' => $faker->text,
                'slug' => $faker->slug,
                'description' => $faker->text,
                'category_id' => $faker->category_id,
                'description' => $faker->description,
                'status' => $faker->status
                
            ]);
        }
    }

}
