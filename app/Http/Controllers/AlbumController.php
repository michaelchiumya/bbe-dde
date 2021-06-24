<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\ArtistResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Album[]|Collection|JsonResource
     */
    public function index()
    {
        return Album::all();
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Album::create($request->all());
        return response()->json(["created" =>true], 204);
    }


    /**
     * Display the specified resource.
     * @param $id
     * @return ArtistResource|JsonResponse
     */
    public function show($id)
    {
        $album = Album::find($id);
        if(!$album){
            return response()->json(['not found'], 404);
        }
        return new ArtistResource($album);
    }


    /**
     * Show the form for editing the specified resource.
     * @param Request $request
     * @param $id
     * @return AlbumResource|JsonResponse
     */
    public function edit(Request $request, $id)
    {
        $album = Album::find($id);
        if(!$album){
            return response()->json(['not found'], 404);
        }
        $album-> update($request->all());
        return new AlbumResource($album);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return AlbumResource|JsonResponse
     */
    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        if(!$album){
            return response()->json(['not found'], 404);
        }
        $album->update($request->all());
        return new AlbumResource($album);
    }


    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $album = Album::find($id);
        if(!$album ){
            return response()->json(['not found'], 404);
        }
        Album::destroy($id);
        return response()->json(["deleted"], 204);
    }
}
