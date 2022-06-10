<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('addComment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'comment' => ['required', 'string']
        ]);

        file_put_contents('../public/comments.txt', response()->json($request->only(['username', 'comment']), 201));
        return response()->json($request->only(['username', 'comment']), 201);
    }
}
