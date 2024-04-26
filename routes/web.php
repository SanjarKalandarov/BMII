<?php

use App\Http\Controllers\MqttController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Salman\Mqtt\MqttClass\Mqtt;

//use PhpMqtt\Client\Facades\MQTT;
//use PhpMqtt\Client\MttClient;q

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
Route::get('/button',function (){
    return view('button');
});

Route::get('/', function () {
Route::get('/',function () {
    return view('dashboard');
});

//Route::get('/mqtt-connect', function () {
//
////    $mqtt = MQTT::connection();
////    $mqtt->subscribe('some/topic', function (string $topic, string $message) {
////        echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
////    }, 1);
////    $mqtt->publish('some/topic', 'foo', 1);
////    $mqtt->publish('some/other/topic', 'bar', 2, true); // Xabarni saqlab qo'yish
////    $mqtt->loop(true);
//    try {
//        $mqtt = new MqttClient('mqtt://195.158.8.44:1883');
//        $connectionSettings = (new \PhpMqtt\Client\ConnectionSettings)
//            ->setUsername("mqtt_citron")
////            ->setConnectTimeout(3)
//            ->setPassword("c1tr0nR&D");
//        $mqtt->connect($connectionSettings, true);
//
//        $mqtt->publish('topic', 'Test xabar');
//        $mqtt->disconnect();
//        echo "MQTT server bilan muvaffaqiyatli bog'landi va xabar yuborildiiiiiiiiiiiiiiiii.";
//    } catch (\Exception $e) {
//        echo "MQTT serverga bog'lanishda xatolik yuz berdi: " . $e->getMessage();
//    }
//
//
//
//});

//Route::get('/subscribe', function () {
//    try {
//        // MQTT obyektini yaratish
//        $mqtt = new Mqtt();
//
//        // MQTT serverga ulanish
//        $mqtt->ConnectAndSubscribe('topic', function ($topic, $message) {
//            // Qabul qilingan xabarlar
//            echo "Mavzu: $topic, Xabar: $message\n";
//        }, 'mqtt_citron', 'c1tr0nR&D');
//
//        echo "MQTT serverga muvaffaqiyatli bog'landi va mavzu uchun subscribe qilindi.";
//    } catch (\Exception $e) {
//        echo "MQTT serverga bog'lanishda xatolik yuz berdi: " . $e->getMessage();
//    }
//});
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
