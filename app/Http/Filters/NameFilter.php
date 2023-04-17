<?php

namespace App\Http\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class NameFilter extends BaseFilter
{
    public function handle(Builder $query, Closure $next): Builder
    {
        if ($this->request->has('name')) {
            $query->whereFullText('name', $this->request->get('name'));
        }

        return $next($query);
    }
}
