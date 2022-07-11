<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Category;
use App\Models\News;
use App\Models\ParsedNews;
use App\Models\Resource;
use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderParsedNews;
use App\Queries\QueryBuilderResources;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ParserController extends Controller
{
    public function index(QueryBuilderResources $resources) {

//        $files = Storage::disk('local')->allFiles('news');

        return view('admin.parser.index', [
            'resources' => $resources->getResources(),
//            'files' => $files
        ]);
    }

    public function create() {
        return view('admin.parser.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'link' => ['required', 'url'],
        ]);

        $e = explode('/', $validated['link']);
        $validated['filename'] = end($e);

        $resource = Resource::create($validated);

        if ($resource) {
            return redirect()->route('admin.parser.index')
                ->with('success', trans('message.admin.resource.create.success'));
        }

        return back()->with('error', trans('message.admin.resource.create.fail'));
    }

    public function parseNews() {
        $urls = Resource::all('link');

        foreach ($urls as $url) {
//            dispatch(new NewsParsing($url->link));
//            dd($url->link);

            dispatch_sync(new NewsParsing($url->link));
        }

        return back()->with('success', "Новости добавлены в хранилище");
    }

    public function sendNewsFromStorageToDB(QueryBuilderCategories $categories, int $id)
    {
        $fileName = Resource::where('id', $id)->get('filename')->first();

        $data = json_decode(Storage::disk('local')->get('news/'.$fileName['filename']));

        if ($data) {
            $categoryToAdd = [
                'title' => $data->title,
                'description' => $data->description,
                'created_at' => $data->lastBuildDate,
                'parsed' => true
            ];
            $category = new Category($categoryToAdd);

            if($category->save()) {
                $news = $data->news;

                foreach ($news as $newsItem) {

                    $newsToAdd = [
                        'category_id' => $category->id,
                        'title' => $newsItem->title,
                        'description' => $newsItem->description,
                        'created_at' => $newsItem->pubDate
                    ];

                    News::create($newsToAdd);
                }
                return redirect()->route('admin.categories.index')
                    ->with('success', 'Категория с новостями добалена');
            }
            return back()->with('error', 'Ошибка парсинга категории');
        }

        return back()->with('error', 'Ошибка парсинга категории: попробуйте еще раз запустить очередь');
    }

    public function destroy(Resource $resource)
    {
        try {
            $resource->delete();

            return response()->json('ok');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());

            return response()->json('error', 400);
        }
    }
}
