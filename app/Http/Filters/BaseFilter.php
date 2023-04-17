<?php

namespace App\Http\Filters;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseFilter
{
    public function __construct(
        protected Request $request
    ) {
    }

    abstract public function handle(Builder $builder, Closure $next): Builder;
}
