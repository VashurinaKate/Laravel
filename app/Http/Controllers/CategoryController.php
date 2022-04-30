<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();

        return view('categories.index', [
            'categoriesList' => $categories
        ]);
    }
}
