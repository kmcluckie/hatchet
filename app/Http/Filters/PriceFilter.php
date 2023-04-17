<?php

namespace App\Http\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class PriceFilter extends BaseFilter
{
    public function handle(Builder $query, Closure $next): Builder
    {
        if ($this->request->has('price_lte')) {
            $query->where('price', '<=', $this->request->get('price_lte'));
        }
        if ($this->request->has('price_gte')) {
            $query->where('price', '>=', $this->request->get('price_gte'));
        }

        return $next($query);
    }
}
