<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(int $categoryId)
    {
        $model = app(News::class);
        $news = $model->getNewsByCategory($categoryId);
        return view('news.index', [
            'news' => $news
        ]);
    }

    public function show(int $id)
    {
        $model = app(News::class);
        $news = $model->getNewsById($id);

        return view('news.show', [
            'news' => $news
        ]);
    }

    public function add()
    {
        return view('news.add');
    }
}
