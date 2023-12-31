<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataCollection;
use Illuminate\Support\Carbon;

class DataCollectionController extends Controller
{
    


    public function create(Request $request){

        
        $newdata = DataCollection::create([
            'first_name' => $request->first_name ?? null,
            'last_name' => $request->last_name ?? null,
            'middle_name' => $request->middle_name ?? null,
            'date_of_birth' =>  Carbon::parse($request->date_of_birth) ?? null,
            'place_of_birth_city' => $request->place_of_birth_city ?? null,
            'place_of_birth_province' => $request->place_of_birth_province ?? null,
            'place_of_birth_country' => $request->place_of_birth_country ?? null,
            'father_first_name' => $request->father_first_name ?? null,
            'father_last_name' => $request->father_last_name ?? null,
            'father_middle_name' => $request->father_middle_name?? null,
            'mother_first_name' => $request->mother_first_name?? null,
            'mother_last_name' => $request->mother_last_name?? null,
            'mother_middle_name' => $request->mother_middle_name?? null,
            'latitude' =>  $request->latitude?? null,
             'longitude' => $request->latitude?? null,
            'place_id' => $request->place_id?? null,
            'address' => $request->address?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        
        $newdata->date_of_birth  = Carbon::parse($newdata->date_of_birth)->toDateString(); // Format to string


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
