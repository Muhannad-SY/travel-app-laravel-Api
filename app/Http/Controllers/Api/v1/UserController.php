<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" =>"required|string|min:3",
            "email"=> "required|email:rfc,dns",
            "password" => "required|string"
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);
        $tea =$user->createToken($request->email)->plainTextToken;
       return response()->json([
        'user' => $user,
        'token'=> $tea,  
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id)->get();
       return response()->json($user); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function login(Request $request){
        $request->validate([             
            "email"=> "required|email",
            "password" => "required|string"
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
           
        
        if (Hash::check($request->password, $user->password)) {
            $tea= $user->createToken($request->email)->plainTextToken;
            return response()->json([
                'user' => $user,
                'token'=> $tea,
        
            ]);
        }else{
            return response()->json(['message' => 'wronge password']);
        }
    }else {
        return response()->json(['message' => 'wronge Email']);    }
    }


    public function logout(Request $request)
    {
         $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Token revoked']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
