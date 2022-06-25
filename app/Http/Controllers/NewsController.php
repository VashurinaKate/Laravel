<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Queries\QueryBuilderNews;
//use Illuminate\Http\Request;
use Route;
use Request;

class NewsController extends Controller
{
    public function index(QueryBuilderNews $news)
    {
        $id = Route::current()->parameter('id');
        $category = Category::where('id', $id)->get('title');

        return view('news.index', [
            'news' => $news->getNews($id),
            'category' => $category[0],
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
        $categories = Category::all();
        return view('news.add', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string']
        ]);

        $validated = $request->except(['_token', 'image']);
        $validated['slug'] = \Str::slug($validated['title']);

        $news = News::create($validated);

        if ($news) {
            return redirect()->route('categories')
                ->with('success', trans('message.admin.news.create.success'));
        }

        return back()->with('error', trans('message.admin.news.create.fail'));
    }
}
