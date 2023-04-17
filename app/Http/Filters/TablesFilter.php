<?php

namespace App\Http\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class TablesFilter extends BaseFilter
{
    public function handle(Builder $query, Closure $next): Builder
    {
        if ($this->request->has('tables')) {
            $query->where('tables', $this->request->get('tables'));
        }

        return $next($query);
    }
}
