<?php

declare(strict_types=1);

namespace App\Queries;

//use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderProfiles implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return User::query();
    }

    public function getProfiles(): LengthAwarePaginator
    {
        return User::select(['id', 'name', 'email', 'is_admin'])
            ->paginate(10);
    }
}
