<?php

use App\Http\Controllers\MqttController;
use App\Http\Controllers\ProfileController;
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
Route::get('/',function () {
    return view('dashboard');
});

Route::get('/mqtt-connect', function () {

//    try {
//        // MQTT klientini hosil qilamiz
//        $mqtt = new MqttClient('mqtt://195.158.8.44:1883');
//
//        // Ulanish sozlamalarini o'rnatamiz
//        $connectionSettings = (new \PhpMqtt\Client\ConnectionSettings)
//            ->setUsername("mqtt_citron")
////        ->setConnectTimeout(3)
//            ->setPassword("c1tr0nR&D");
//
//        // MQTT serverga ulanish
//        $mqtt->connect($connectionSettings, true);
//
//        // Xabarni yuboramiz
//        $mqtt->publish('topic', 'Test xabar');
//
//        // Ulanishni to'xtatamiz
//        $mqtt->disconnect();
//
//        // Xabaringiz yuborilganligi to'g'risida xabar chiqaramiz
//        echo "MQTT server bilan muvaffaqiyatli bog'landi va xabar yuborildi.";
//    } catch (\Exception $e) {
//        // Xatolik yuz berishida xabar chiqaramiz
//        echo "MQTT serverga bog'lanishda xatolik yuz berdi: " . $e->getMessage();
//    }



});

//Route::get('/', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/connect',[MqttController::class,'connect'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
