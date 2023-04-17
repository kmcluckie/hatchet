<?php

namespace App\Http\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class OfficesFilter extends BaseFilter
{
    public function handle(Builder $query, Closure $next): Builder
    {
        if ($this->request->has('offices')) {
            $query->where('offices', $this->request->get('offices'));
        }

        return $next($query);
    }
}
