<?php

namespace App\Http\Controllers;

use Faker\Factory;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(int $id = null): array
    {
        $news = [];
        $faker = Factory::create();

        if($id) {
            return [
                'id' => $id,
                // 'category_id' => $categoryId,
                'title' => $faker->jobTitle(),
                'author' => $faker->name(),
                'image' => $faker->imageUrl(),
                'description' => $faker->text(150),
                'created_at' => now('Europe/Moscow')
            ];
        };

        for($i = 0; $i < 10; $i++) {
            $news[] = [
                'id' => $i,
                // 'category_id' => $categoryId,
                'title' => $faker->jobTitle(),
                'author' => $faker->name(),
                'image' => $faker->imageUrl(),
                'description' => $faker->text(150),
                'created_at' => now('Europe/Moscow')
            ];
        }

        return $news;
    }


    public function getCategories(int $id = null): array
    {
        $categories = [];
        $faker = Factory::create();

        if($id) {
            return $this->getNews();
        };

        for($i = 0; $i < 5; $i++) {
            $categories[] = [
                'id' => $i,
                'title' => $faker->jobTitle(),
                'created_at' => now('Europe/Moscow')
            ];
        }
        return $categories;
    }
}
