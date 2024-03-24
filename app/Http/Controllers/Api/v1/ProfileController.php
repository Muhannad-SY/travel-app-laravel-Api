<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $userProfile = Profile::where('user_id' ,  $id)->first();
        return response()->json($userProfile);
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
            'user_id'=> 'required'
        ]);
        $newProfile = Profile::create([
            "phone_number" =>  $request->phone_number,
            "image" =>  $request->image,
            "birth_date" =>  $request->birth_date,
            "user_id" =>  $request->user_id,
        ]);
        return response()->json($newProfile);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $updateProfile = Profile::whrer('user_id' , $id)->first();
        $updateProfile->phone_number = $request->phone_number ??  $updateProfile->phone_number; 
        $updateProfile->image = $request->image ??  $updateProfile->image; 
        $updateProfile->birth_date = $request->birth_date ??  $updateProfile->birth_date; 
        $do = $updateProfile->save();
        if (!$do) {
            return response()->json(['message' => 'update filed']);
        }else {
            return response()->json(['message' => 'update seccefuly']);
        }
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
