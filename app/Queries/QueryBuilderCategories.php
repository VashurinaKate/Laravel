<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderCategories implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return Category::query();
    }

    public function getCategories(): LengthAwarePaginator
    {
        return Category::select(['id', 'title', 'description', 'parsed', 'created_at'])
            ->withCount('news')
            ->paginate(10);
    }
}
