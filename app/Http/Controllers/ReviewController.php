<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Queries\QueryBuilderReviews;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(QueryBuilderReviews $reviews)
    {
        return view('reviews.index', [
            'reviews' => $reviews->getReviews()
        ]);
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'review' => ['required', 'string']
        ]);

        $validated = $request->except(['_token']);

        $reviews = Review::create($validated);

        if ($reviews) {
            return redirect()->route('reviews')
                ->with('success', 'Отзыв успешно добавлен');
        }

        return back()->with('error', 'Ошибка добавления');
    }
}
