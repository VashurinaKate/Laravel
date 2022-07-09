<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\ParsedNews;
use App\Models\Resource;
use App\Queries\QueryBuilderParsedNews;
use App\Queries\QueryBuilderResources;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ParserController extends Controller
{
    public function index(QueryBuilderResources $resources) {
        return view('admin.parser.index', [
            'resources' => $resources->getResources()
        ]);
    }

    public function create() {
        return view('admin.parser.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'link' => ['required', 'url'],
        ]);

        $resource = Resource::create($validated);

        if ($resource) {
            return redirect()->route('admin.parser.index')
                ->with('success', trans('message.admin.resource.create.success'));
        }

        return back()->with('error', trans('message.admin.resource.create.fail'));
    }

    public function parse(QueryBuilderResources $resources) {
        $urls = $resources->getUrls();
        foreach ($urls as $url) {
            dispatch(new NewsParsing($url));
        }

        return back()->with('success', "Новости добавлены в очередь");
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
