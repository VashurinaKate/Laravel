<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgregatorController extends Controller
{
    public function index()
    {
        return view('agregator');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string'],
            'url' => ['required', 'string']
        ]);

        file_put_contents('../public/userData.txt', response()->json($request->only(['name', 'phone', 'email', 'url']), 201));
        return response()->json($request->only(['name', 'phone', 'email', 'url']), 201);
    }
}
