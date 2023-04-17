<?php

namespace App\Http\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class AreaFilter extends BaseFilter
{
    public function handle(Builder $query, Closure $next): Builder
    {
        if ($this->request->has('sqm_lte')) {
            $query->where('sqm', '<=', $this->request->get('sqm_lte'));
        }
        if ($this->request->has('sqm_gte')) {
            $query->where('sqm', '>=', $this->request->get('sqm_gte'));
        }

        return $next($query);
    }
}
