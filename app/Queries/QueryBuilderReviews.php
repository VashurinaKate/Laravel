<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Review;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderReviews implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return Review::query();
    }

    public function getReviews(): LengthAwarePaginator
    {
        return Review::select(['id', 'username', 'review', 'created_at'])
            ->paginate(10);
    }
}
