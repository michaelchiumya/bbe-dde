<?php

namespace App\Http\Controllers;

use App\artist;
use App\Http\Resources\SongResource;
use App\Song;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return JsonResource
     */
    public function index(): JsonResource
    {
        return new JsonResource(Song::all());
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        Song::create($request->all());
        return response()->json(null, 204);
    }


    /**
     * Display the specified resource.
     * @param $id
     * @return SongResource|JsonResponse
     */
    public function show($id)
    {
        $song = artist::find($id);
        if(!$song){
            return response()->json(['not found'], 404);
        }
        return new SongResource($song);
    }


    /**
     * Show the form for editing the specified resource.
     * @param Request $request
     * @param $id
     * @return SongResource|JsonResponse
     */
    public function edit(Request $request, $id)
    {
        $song = artist::find($id);
        if(!$song){
            return response()->json(['not found'], 404);
        }
        $song-> update($request->all());
        return new SongResource($song);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return SongResource|JsonResponse
     */
    public function update(Request $request, $id)
    {
        $song = artist::find($id);
        if(!$song){
            return response()->json(['not found'], 404);
        }
        $song->update($request->all());
        return new SongResource($song);
    }


    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        Song::destroy($id);
        return response()->json("resource deleted", 204);
    }

    public function artistSongs($id): JsonResponse
    {
        $songs = Song::where('artist_id', $id)->get();
        return response()->json($songs, 200);
    }

    public function artistAlbums($id): JsonResponse
    {
        $albums = Song::where('album_id', $id)->get();
        return response()->json($albums, 200);
    }
}
