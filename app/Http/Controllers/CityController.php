<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCitiesByProvince($provinceId)
    {
        $cities = City::query()
            ->where('province_id', $provinceId)
            ->get();

        return response()->json($cities);
    }
}
