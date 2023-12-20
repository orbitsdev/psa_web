<?php

use App\Http\Controllers\Api\FileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::post('/login-account', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }


    $token = $user->createToken($request->device_name)->plainTextToken;
    $data = [
        'user' => $user,
        'token' => $token,

    ];


    return response()->json([
        'success' => true,
        'data' => $data,
    ], 200);


})->name('login-account');

Route::post('/logout-user', function (Request $request) {
    // // Auth::user()->tokens();
  $user = request()->user(); //or Auth`::user()
    // $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

    // delete all tokens, essentially logging the user out
    
    // delete the current token that was used for the request
    $request->user()->currentAccessToken()->delete();
    
    $user->tokens()->delete();
    return response()->json([
        'success' => true,
        'data' => 'logged out',
    ], 200);

})->name('logout-account')->middleware(['auth:sanctum']);


Route::post('/upload-file', [FileController::class , 'uploadFile'])->name('upload-file');

