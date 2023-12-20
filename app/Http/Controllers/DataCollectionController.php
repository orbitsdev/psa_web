<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataCollection;

class DataCollectionController extends Controller
{
    


    public function create(Request $request){

        
        $newdata = DataCollection::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'date_of_birth' => $request->dadate_of_birthte,
            'place_of_birth_city' => $request->place_of_birth_city,
            'place_of_birth_province' => $request->place_of_birth_province,
            'place_of_birth_country' => $request->place_of_birth_country,
            'father_first_name' => $request->father_first_name,
            'father_last_name' => $request->father_last_name,
            'father_middle_name' => $request->father_middle_name,
            'mother_first_name' => $request->mother_first_name,
            'mother_last_name' => $request->mother_last_name,
            'mother_middle_name' => $request->mother_middle_name,
            'latitude' => floatval($request->latitude),
            'longitude' => floatval($request->longitude),
            'place_id' => $request->place_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        return response()->json([
            'status'=> true,
            'message' => 'success',
            'data'=> $newdata,
        ],200);

    }

    public function test(Request $request){


        return response()->json([
            'status'=> true,
            'message' => 'test success',
            // 'data'=> $newdata,
        ], 

        200,

    
    );

    }

   

}
