<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Resources\DistrictResource;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::all();
        $data = [];

        foreach ($regions as $region) {
            $regionData = [
                'id' => $region->id,
                'name' => $region->name,
                'districts' => DistrictResource::collection($region->districts)
            ];

            // if (App::isLocale('ru')) {
            //     $regionData['name'] = $region->rus_name;
            // } else {
            //     $categoryData['name'] = $region->name;
            // }

            $data[] = $regionData;
        }

        return response()->json([
            'status' =>  true,
            'message' => 'Successfully',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        //
    }
}
