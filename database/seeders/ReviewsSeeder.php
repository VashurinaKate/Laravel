<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'username' => $faker->name(),
                'review' => $faker->text(150),
                'created_at' => $faker->date()
            ];
        }
        return $data;
    }
}
