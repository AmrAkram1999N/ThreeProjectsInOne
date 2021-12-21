<?php

use App\Http\Controllers\BackServiceController;
use App\Http\Controllers\TelegramController;
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


Route::post('/'.env('TELEGRAM_TOKEN','5067344122:AAGfKhBxMPbDdj04Xilzn1AtTThgUkLpJRs'),[TelegramController::class, 'index'])->name('webhook');

