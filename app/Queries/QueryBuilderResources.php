<?php
declare(strict_types=1);

namespace App\Queries;

use App\Models\Resource;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderResources implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return Resource::query();
    }

    public function getResources(): LengthAwarePaginator
    {
        return Resource::select(['id', 'link'])->paginate(12);
    }

    public function getUrls(): Builder
    {
        return Resource::select(['link']);
    }
}
