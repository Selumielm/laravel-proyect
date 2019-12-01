<?php

use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', function (Request $request) {

    $user = User::where([
        'password' => $request->all()['password'],
        'email' => $request->all()['email'],
    ])->first();

    return response()->json(['res' => isset($user) ? true : false], 200);
});

Route::resource('beneficiarios', 'BeneficiarioController', ['except' => ['create', 'edit']]);
Route::resource('donaciones', 'DonacionController', ['except' => ['create', 'edit']]);
