<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Queries\QueryBuilderNews;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(QueryBuilderNews $news)
    {
        return view('news.index', [
            'news' => $news->getNews()
        ]);
    }

    public function show(QueryBuilderNews $news, $id)
    {
        return view('news.show', [
            'news' => $news->getNewsById($id)
        ]);
    }

    public function add()
    {
        return view('news.add');
    }
}
