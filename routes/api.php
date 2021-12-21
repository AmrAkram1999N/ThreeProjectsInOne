<?php

use App\Http\Controllers\Api\ApiAccountProfile;
use App\Http\Controllers\Api\ApiAuthContoller;
use App\Http\Controllers\Api\ApiFileManagerService;
use App\Http\Controllers\Api\ApiShortLinkService;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiUserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//GET /api/short_link_service ->index
//POST /api/short_link_service ->store
//GET /api/short_link_service  ->show
//PUT|PATCH /api/short_link_service ->update
//DELETE /api/short_link_service ->delete


Route::post('loginUser', [ApiAuthContoller::class, 'loginUser'])->middleware('guest:sanctum');

Route::post('loginAccount', [ApiAuthContoller::class, 'loginAccount'])->middleware('guest:sanctum');

Route::delete('logoutAccount', [ApiAuthContoller::class, 'logoutAccount'])->middleware('auth:sanctum');

Route::delete('logoutUser', [ApiAuthContoller::class, 'logoutUser'])->middleware('auth:sanctum');

Route::post('createUser',[ApiAuthContoller::class, 'createUser'])->middleware('guest:sanctum');



//User_Actions
Route::post('createAccount', [ApiUserController::class, 'createAccount']);

//User Profile
Route::post('changePhoto', [ApiUserProfile::class,'changePhoto']);

Route::put('updateInfo',[ApiUserProfile::class,'updateInfo']);

//Account Profile
Route::post('changePhoto', [ApiAccountProfile::class,'changePhoto']);

Route::put('updateInfo',[ApiAccountProfile::class,'updateInfo']);

//Short_Link_Service
Route::get('getUrls',[ApiShortLinkService::class,'getUrls']);

Route::get('openUrl',[ApiShortLinkService::class, 'openUrl']);

Route::post('addUrl',[ApiShortLinkService::class,'addUrl']);

Route::post('editUrl',[ApiShortLinkService::class,'editUrl']);

Route::delete('deleteUrl',[ApiShortLinkService::class,'deleteUrl']);

//File_Manager_Service
Route::post('createFolder',[ApiFileManagerService::class,'createFolder']);

Route::post('uploadFiles',[ApiFileManagerService::class,'uploadFiles']);

