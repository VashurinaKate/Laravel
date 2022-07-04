<?php

namespace App\Http\Controllers;

use App\Services\Contract\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index()
    {
        if (isset($data)) {
            return view('parser.index', [
                'data' => $data
            ]);
        } else {
            return view('parser.index');
        }
    }

    public function create()
    {
        return view('parser.create');
    }

    public function store(Request $request, Parser $parser)
    {
        $request->validate([
//            'name' => ['required', 'string'],
//            'phone' => ['required', 'string'],
//            'email' => ['required', 'string'],
            'url' => ['required', 'url']
        ]);

        $url = $request->get('url');
        $data = $parser->setLink($url)->parse();

//        dd($data);

        if ($data) {
            $json = response()->json($data);

            $fp = fopen('../public/parser/file.txt', 'w');
            fwrite($fp, $json);
            fclose($fp);

            return redirect()->route('userParser')
                ->with('success', trans('message.userParser.create.success'));
        }

        return back()->with('error', trans('message.userParser.create.fail'));
    }
}
