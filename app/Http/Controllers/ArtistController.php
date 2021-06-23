<?php

namespace App\Http\Controllers;

use App\artist;
use App\Http\Resources\ArtistResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index(): JsonResource
    {
        return new JsonResource(artist::all());
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
           artist::create($request->all());
           return response()->json(null, 204);
    }


    /**
     * Display the specified resource.
     * @param $id
     * @return ArtistResource
     */
    public function show($id): ArtistResource
    {
        $artist = artist::find($id);
        return new ArtistResource($artist);
    }


    /**
     * Show the form for editing the specified resource.
     * @param Request $request
     * @param $id
     * @return ArtistResource
     */
    public function edit(Request $request, $id): ArtistResource
    {
        $artist = artist::findOrFail($id);
        $artist-> update($request->all());
        return new ArtistResource($artist);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return ArtistResource
     */
    public function update(Request $request, $id): ArtistResource
    {
        $artist = artist::findOrFail($id);
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
        artist::destroy($id);
        return response()->json(null, 204);
    }
}
