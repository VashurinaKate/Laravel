<?php

namespace App\Queries;

use App\Models\ParsedNews;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderParsedNews implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return ParsedNews::query();
    }

    public function getParsedNews(): LengthAwarePaginator
    {
        return ParsedNews::select(['id', 'title', 'link', 'description', 'created_at'])
            ->paginate(10);
    }
}
