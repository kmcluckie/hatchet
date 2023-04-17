<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Location::query();

        $locations = app(\Illuminate\Pipeline\Pipeline::class)
            ->send($query)
            ->through([
                \App\Http\Filters\NameFilter::class,
                \App\Http\Filters\OfficesFilter::class,
                \App\Http\Filters\TablesFilter::class,
                \App\Http\Filters\PriceFilter::class,
                \App\Http\Filters\AreaFilter::class,
            ])
            ->thenReturn()
            ->get();

        return $locations;
    }
}
