<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
//    public function __invoke(Request $request, Parser $parser)
//    {
//        dd($parser->setLink('https://news.yandex.ru/music.rss')
//            ->parse()
//        );
//    }
    public function index(Request $request, Parser $parser) {
        $json = file_get_contents('../public/parser.txt');
        $data = json_decode($json);
//        dd($data);

        return view('admin.parser.index', [
            'data' => $data
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

        if ($data) {
            file_put_contents('../public/parser.txt', response()->json($data), 201);

            return redirect()->route('admin.parser.index')
                ->with('success', trans('message.admin.parser.create.success'));
        }

        return back()->with('error', trans('message.admin.parser.create.fail'));
    }
}
