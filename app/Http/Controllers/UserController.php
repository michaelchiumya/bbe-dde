<?php

namespace App\Http\Controllers;



use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    /**
     * login user to acquire token for stateless http request.
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken], 200);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

         $validatedData['password'] = bcrypt($request->password);
         $user = User::create($validatedData);
         $accessToken = $user->createToken('authToken')->accessToken;
        return response([ 'user' => $user, 'access_token' => $accessToken], 204);
    }


    /**
     * logout authenticated user.
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        //$result = auth()->user()->token()->revoke();
       $result = auth('api')->user()->token()->revoke();

        if($result ){
           return  response()->json(['error'=>false,'message'=>'User logout successfully.','result'=>[]]);

          }else{
             return  response()->json(['error'=>true,'message'=>'Something is wrong.','result'=>[]],400);
         }
    }


    /**
     * Display the specified resource.     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(['not found'], 404);
        }
        return new JsonResponse($user);
    }


    /**
     * Update the specified resource in storage.     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(['not found'], 404);
        }
        $user->update( $request->all());
        return new JsonResponse($user);
    }


    /**
     * Remove the specified resource from storage.     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        User::destroy($id);
        return response()->json("resource deleted", 204);
    }
}
