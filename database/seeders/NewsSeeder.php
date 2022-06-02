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

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->jobTitle();
            $data[] = [
                'category_id' => 1,
                'title' => $title,
                'slug' => \Str::slug($title),
                'author' => $faker->name(),
                'description' => $faker->text(150)
            ];
        }
        return $data;
    }
}
