<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;
use App\Models\City;
use Illuminate\Http\Request;


/*DIFFERENT BETWEEN Collection and New
- look at code below, it means it  get all of the City data
        return CityResource::collection($cities);

- look at code below, it means it  just get one data
        return new CityResource($city);
 * */

class CityController extends Controller
{
    public function index()
    {
        $cities = City::withCount('officeSpaces')->get();
        return CityResource::collection($cities);
    }

    public function show(City $city)
    {
        $city->load(['officeSpaces.city',  'officeSpaces.photos']);
        $city->loadCount('officeSpaces');
        return new CityResource($city);
    }


}
