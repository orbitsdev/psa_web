<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    

    
public function uploadFile(Request $request)
{
    if ($request->hasFile('file')) {
        $file = $request->file('file');

        // Move the uploaded file to the desired location in the public storage directory
        $path = $file->store('public/uploads');

        // You can also extract other file information if needed
        $fileName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
        $fileSize = $file->getSize();

        // Save the file information to the database or perform any other necessary actions

        return response()->json(['message' => 'File uploaded successfully']);
    }

    return response()->json(['message' => 'No file uploaded'], 400);
}

}
