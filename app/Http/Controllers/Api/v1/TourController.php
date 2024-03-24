<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = [];
        for($i = 0 ; $i<5 ; $i++){
            $rand = rand(1,3);
            if(!in_array($rand , $list)){
                $list[] = $rand;
            }  
        }

        $cat = Category::whereIn('id' , $list)
        ->orderByRaw(DB::raw("FIELD(id, " . implode(',', $list) . ")"))
        ->get();
        return response()->json($cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $tour = Tour::where('country' , $request->country)->get();
        return response()->json($tour);
    }

    public function showOneTour($id)
    {
        $tour = Tour::where('id' , $id)->with('reviwes')->first();
        return response()->json($tour);
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
