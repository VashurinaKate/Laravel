<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParsedNews;
use App\Queries\QueryBuilderParsedNews;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index(QueryBuilderParsedNews $parsedNews) {
        return view('admin.parser.index', [
            'parsedNews' => $parsedNews->getParsedNews()
        ]);
    }

    public function create() {
        return view('admin.parser.create');
    }

    public function parse(Request $request, Parser $parser) {
        $request->validate([
           'url' => ['required', 'url']
        ]);

        $url = $request->get('url');
        $data = $parser->setLink($url)->parse();

        if (isset($data['news'])) {
            for ($i = 0; $i < count($data['news']); $i++) {
                ParsedNews::create([
                    'title' => $data['news'][$i]['title'],
                    'link' => $data['news'][$i]['link'],
                    'guid' => $data['news'][$i]['guid'],
                    'description' => $data['news'][$i]['description'],
                    'created_at' => $data['news'][$i]['pubDate']
                ]);
            }
        }

        if ($data) {
            return redirect()->route('admin.parser.index')
                ->with('success', trans('message.admin.parser.create.success'));
        }

        return back()->with('error', trans('message.admin.parser.create.fail'));
    }
}
