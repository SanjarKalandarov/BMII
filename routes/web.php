<?php

use App\Http\Controllers\MqttController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpMqtt\Client\MqttClient;
use Salman\Mqtt\MqttClass\Mqtt;
//use PhpMqtt\Client\Facades\MQTT;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/button',function (){
//    return view('button');
//});

Route::get('/',function () {
//    dd('salom');
    return view('button');

})->middleware(['auth', 'verified'])->name('dashboard');


//Route::get('/connect',[MqttController::class,'connected'])->middleware(['auth', 'verified'])->name('connect');
Route::get('connect',[MqttController::class,'Connect'])->middleware(['auth', 'verified'])->name('connect_send');
Route::get('/send-zero-message', [MqttController::class, 'sendZeroMessage'])->name('send.zero.message');

//Route::get('/logout', function(){
//    Auth::logout(); // Foydalanuvchini tizimdan chiqarish
//    return redirect('/login');
//})->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
