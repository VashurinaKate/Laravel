<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }
    private function getData(): array
    {
        $data = [];
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $title = $faker->jobTitle();
            $data[] = [
                'category_id' => $faker->randomDigitNot(0),
                'title' => $title,
                'slug' => \Str::slug($title),
                'image' => $faker->imageUrl(640, 480, 'animals', true),
                'author' => $faker->name(),
                'description' => $faker->text(150),
                'created_at' => $faker->date()
            ];
        }
        return $data;
    }
}
