<?php

namespace App\Http\Controllers;

use App\artist;
use App\Http\Resources\ArtistResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return artist[]|Collection|JsonResource
     */
    public function index()
    {
        return artist::all();
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        artist::create($request->all());
        return response()->json(["created" =>true], 204);

    }


    /**
     * Display the specified resource.
     * @param $id
     * @return ArtistResource|JsonResponse
     */
    public function show($id)
    {
        $artist = artist::find($id);
        if(!$artist){
            return response()->json(['not found'], 404);
        }
        return new ArtistResource($artist);
    }



    /**
     * Show the form for editing the specified resource.
     * @param Request $request
     * @param $id
     * @return ArtistResource|JsonResponse
     */
    public function edit(Request $request, $id)
    {
        $artist = artist::find($id);
        if(!$artist){
            return response()->json(['not found'], 404);
        }
        $artist-> update($request->all());
        return new ArtistResource($artist);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return ArtistResource|JsonResponse
     */
    public function update(Request $request, $id)
    {
        $artist = artist::find($id);
        if(!$artist){
            return response()->json(['not found'], 404);
        }
        $artist->update($request->all());
        return new ArtistResource($artist);
    }


    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $artist = artist::find($id);
        if(!$artist){
            return response()->json(['not found'], 404);
        }
        artist::destroy($id);
        return response()->json(null, 204);
    }
}
