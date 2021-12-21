<?php
use App\Http\Controllers\AccountProfileController;
use App\Http\Controllers\BackServiceController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

$Model = 'User';
$Guard = 'web';
if (request()->is('Chain/Account/*')) {
    $Model = 'Account';
    $Guard = 'account';
}

// require __DIR__ . '/auth.php';

Route::get('/home', [MainController::class, 'home'])->name('home');
Route::get('/BT{id}', [ShortLinkController::class, 'Redirect_Short_Link'])->name('Redirect_Short_Link');

//Bank card
Route::get('/cardView',[MainController::class,'cardView'])->name('cardView');

//lang
Route::get('/cardView/{lang}', [MainController::class,'cardView'])->name('langChoice');

//process
Route::post('/getNumber',[BackServiceController::class,'getNumber'])->name('getNumber');
Route::post('/previousNumber/{number}', [BackServiceController::class,'previousNumber'])->name('previousNumber');
Route::post('/nextNumber/{number}', [BackServiceController::class,'nextNumber'])->name('nextNumber');

//Projetc System
Route::get('/databaseSystem', [MainController::class, 'databaseSystem'])->name('databaseSystem');
Route::get('/interfaceSystem', [MainController::class, 'interfaceSystem'])->name('interfaceSystem');
Route::get('/controllerModelSystem', [MainController::class, 'controllerModelSystem'])->name('controllerModelSystem');








Route::group([ 'prefix' => 'Chain/User', 'as' => 'Chain.User.'], function () {

    Route::group(['prefix' => '/Auth', 'as' => 'Auth.', 'middleware' => 'auth:web'], function ()
    {
    //User Pages
    Route::get('/userDashBoard', [MainController::class, 'userDashBoard'])->name('userDashBoard');
    Route::get('/userProfile',[MainController::class,'userProfile'])->name('userProfile');

    //User Processes
    Route::post('/update', [UserProfileController::class, 'update'])->name('update');
    Route::post('/ChangePhoto', [UserProfileController::class, 'ChangePhoto'])->name('ChangePhoto');
    Route::post('/update', [UserProfileController::class, 'update'])->name('update');

    //User adjustments
    Route::get('/Enter_Service/{id}', [UserController::class, 'Enter_Service'])->name('Enter_Service');
    Route::get('/Edit_Service', [UserController::class, 'Edit_Service'])->name('Edit_Service');
    Route::get('/Delete_Service/{username}', [UserController::class, 'Delete_Service'])->name('Delete_Service');
    Route::post('/buyMore', [UserController::class, 'buyMore'])->name('buyMore');


});

});


Route::group([ 'prefix' => 'Chain/Account', 'as' => 'Chain.Account.'], function () {

    Route::group(['prefix' => '/Auth', 'as' => 'Auth.', 'middleware' => 'auth:account'], function ()
    {
    //Account Pages
    Route::get('/accountDashboard', [MainController::class, 'accountDashboard'])->name('accountDashboard');
    Route::get('/accountProfile', [MainController::class, 'accountProfile'])->name('accountProfile');
    Route::get('/shortLinkService', [MainController::class, 'shortLinkService'])->name('shortLinkService');
    Route::get('/bankCardService', [MainController::class, 'bankCardService'])->name('bankCardService');
    Route::get('/fileManagerService', [MainController::class, 'fileManagerService'])->name('fileManagerService');

    //Account Processes
    Route::post('/ChangePhoto', [AccountProfileController::class, 'ChangePhoto'])->name('ChangePhoto');
    Route::post('/update', [AccountProfileController::class, 'update'])->name('update');

    //User adjustments: short link
    Route::post('/addShortLink', [ShortLinkController::class, 'addShortLink'])->name('addShortLink');
    Route::post('/editShortLink/{id}', [ShortLinkController::class, 'editShortLink'])->name('editShortLink');
    Route::get('/deleteShortLink/{id}', [ShortLinkController::class, 'deleteShortLink'])->name('deleteShortLink');
    //User adjustments: file manager
    Route::put('/Upload/{folder_path}', [FileController::class, 'Upload'])->name('Upload');
    Route::get('/fileManagerService', [MainController::class, 'fileManagerService'])->name('fileManagerService');
    Route::post('/Create_Folder/{folder_path}', [FolderController::class, 'Create_Folder'])->name('Create_Folder');
    Route::get('/fileManagerService/{folder_path}', [FolderController::class, 'Open_Folder'])->name('Open_Folder');
    //User adjustments: bank service
    Route::post('/getClient', [BackServiceController::class, 'getClient'])->name('getClient');

});

});







Route::get('/webhook', [TelegramController::class, 'webhook']);

Route::get('/BankServiceWebhook', [BackServiceController::class, 'BankServiceWebhook']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {$Model = 'User';if (request()->is('Chain/Account/*')) {$Model = 'Account';}
    // Artisan::call('migrate:fresh');
    $line = Auth::guard('account')->check();
    if($line == true)
    {
        $link = route('Chain.Account.Auth.accountProfile');
    }else
    {
        $link = route('Chain.User.Auth.userProfile');
    }
    return view('ProjectNew.index', [
        'Model' => $Model,
        'linepage' => $link,
    ]);
})->name('welcome');
