<?php

use App\Http\Controllers\MqttController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/',function (){
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/button', [\App\Http\Controllers\Admin\UserController::class,'button'])->middleware(['auth', 'verified'])->name('button');
//Route::get('/', [\App\Http\Controllers\Admin\UserController::class,'button'])->middleware(['auth', 'verified']);

Route::get('/admin',[\App\Http\Controllers\Admin\UserController::class,'admin'])->middleware(['auth', 'verified'])->name('admin');
Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
//Route::get('/', function () {
//    return view('admin.index');
//})->middleware(['auth', 'role:admin'])->name('admin.index');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {


    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::post('role/{role}/permissions', [\App\Http\Controllers\Admin\RoleController::class, 'givePermission'])->name('role.permissions');
    Route::delete('role/{role}/permissions/{permission}', [\App\Http\Controllers\Admin\RoleController::class, 'revokePermission'])->name('role.permissions.revoke');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::post('permissions/{permission}/roles', [\App\Http\Controllers\Admin\PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('permissions/{permission}/roles/{role}', [\App\Http\Controllers\Admin\PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');
    Route::delete('users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users/{user}/roles', [\App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('users/{user}/roles/{roles}', [\App\Http\Controllers\Admin\UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('users/{user}/permissions', [\App\Http\Controllers\Admin\UserController::class, 'assignPermissions'])->name('users.permissions');
    Route::delete('users/{user}/permissions/{permissions}', [\App\Http\Controllers\Admin\UserController::class, 'removePermission'])->name('users.permission.remove');
    Route::get('/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');

// Store a newly created user in storage
    Route::post('/users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');

});


//Route::get('/connect',[MqttController::class,'connected'])->middleware(['auth', 'verified'])->name('connect');
Route::post('connect',[MqttController::class,'Connect'])->middleware(['auth', 'verified'])->name('connect_send');
Route::get('/send-zero-message', [MqttController::class, 'sendZeroMessage'])->name('send.zero.message');
//Route::get('sun',function (){
//    try {
//        $mqtt = new Mqtt();
//        $mqtt->ConnectAndPublish('Rahim121rus', '4', 'mqtt_citron', 'c1tr0nR&D');
//                return response()->json(['status' => 'success', 'message' => 'Eshik ochildi!']);
////        return redirect()->back()->with('success', 'Eshik ochildi!');
//    } catch (\Exception $e) {
//                return response()->json(['status' => 'error', 'message' => 'MQTT serveriga 1-xabar yuborilmadi: ' . $e->getMessage()]);
////        return redirect()->back()->with('error', 'BOmay qoldi');
//    }
//});
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
