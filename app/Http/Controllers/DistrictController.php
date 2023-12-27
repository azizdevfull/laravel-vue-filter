<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Resources\ProductResource;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Request $request, $id)
    {
        $district = District::find($id);

        if (!$district) {
            return response()->json([
                'status' => false,
                'message' => 'Not Found',
            ], 404);
        }

        // if(App::isLocale('ru')){
        //     $district->name = $district->rus_name;
        // }else{
        //     $district->name = $district->name;
        // }

        $perPage = 20;
        $page = intval($request->query('page')) ?? 1;
        $offset = ($page - 1) * $perPage;

        $products = Product::where('district_id', $district->id)
            ->offset($offset)
            ->limit($perPage)
            ->get();

        $total = Product::where('district_id', $district->id)->count();

        $lastPage = ceil($total / $perPage);

        $prevPageUrl = $page > 1 ? $request->fullUrlWithQuery(['page' => $page - 1]) : null;
        $nextPageUrl = $page < $lastPage ? $request->fullUrlWithQuery(['page' => $page + 1]) : null;

        return response()->json([
            'status' => true,
            'district' => [
                'id' => $district->id,
                'name' => $district->name,
                'created_at' => $district->created_at
            ],
            'message' => "",
            'data' => [
                'item' => ProductResource::collection($products),
                '_links' => [
                    'prevPageUrl' => $prevPageUrl,
                    'nextPageUrl' => $nextPageUrl
                ],
                '_meta' => [
                    'total' => $total,
                    'perPage' => $perPage,
                    'currentPage' => $page,
                    'lastPage' => $lastPage,
                ]
            ]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        //
    }
}
