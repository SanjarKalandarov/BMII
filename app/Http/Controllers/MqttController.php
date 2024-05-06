<?php

namespace App\Http\Controllers;

use App\Services\MqttService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\MqttClient;
use Salman\Mqtt\MqttClass\Mqtt;


class MqttController extends Controller
{
    public function Connect(Request $request){
        $isPressed = $request->session()->get('isPressed', false);
        $user = Auth::user();
        if ($user->getRoleNames()[0] == 'student') {
            $startHour = 16;
            $endHour = 17;
            $currentHour = now()->hour;
            if ($currentHour >= $startHour && $currentHour < $endHour) {
                if (!$isPressed) {
                    try {
                        $mqtt = new Mqtt();
                        $mqtt->ConnectAndPublish('Rahim121russ', '1', 'mqtt_citron', 'c1tr0nR&D');
                    } catch (\Exception $e) {
                        return response()->json(['error' => 'MQTT serverga bog\'lanishda xatolik yuz berdi: ' . $e->getMessage()]);
                    }
                    $request->session()->put('isPressed', true);
                } else {
                    // Agar tugma avval bosilgan bo'lsa, '0' yuborish
                    try {
                        $mqtt = new Mqtt();
                        $mqtt->ConnectAndPublish('Rahim121russ', '0', 'mqtt_citron', 'c1tr0nR&D');
                    } catch (\Exception $e) {
                        // Xatolikni qaytarish
                        return response()->json(['error' => 'MQTT serverga bog\'lanishda xatolik yuz berdi: ' . $e->getMessage()]);
                    }
                }

                // Ma'lumot yuborishdan so'ng qaytish
                return redirect()->back();
            } else {
              return redirect()->back()->with('message','Siz bu vaqtda kira olmaysiz');

            }
        } elseif ($user->getRoleNames()[0] === 'teacher') {
            if (!$isPressed) {
                // Agar tugma avval bosilmagan bo'lsa, '1' yuborish
                try {
                    $mqtt = new Mqtt();
                    $mqtt->ConnectAndPublish('Rahim121russ', '1', 'mqtt_citron', 'c1tr0nR&D');
                } catch (\Exception $e) {
                    // Xatolikni qaytarish
                    return response()->json(['error' => 'MQTT serverga bog\'lanishda xatolik yuz berdi: ' . $e->getMessage()]);
                }

                // Tugma bosilganini belgilash
                $request->session()->put('isPressed', true);
            } else {
                // Agar tugma avval bosilgan bo'lsa, '0' yuborish
                try {
                    $mqtt = new Mqtt();
                    $mqtt->ConnectAndPublish('Rahim121russ', '0', 'mqtt_citron', 'c1tr0nR&D');
                } catch (\Exception $e) {
                    // Xatolikni qaytarish
                    return response()->json(['error' => 'MQTT serverga bog\'lanishda xatolik yuz berdi: ' . $e->getMessage()]);
                }
            }

            // Ma'lumot yuborishdan so'ng qaytish
            return redirect()->back();
        }



    }





//    public function connect()
//    {
//        try {
//            // MQTT klientini yaratish
//            $mqtt = new Mqtt();
//
//            // Foydalanuvchi ma'lumotlarini olish
//            $user = Auth::user();
//            $userRole = $user->getRoleNames()->first(); // foydalanuvchi roli
//            $currentHour = date('H'); // joriy soat
//
//            // Foydalanuvchi "o'qituvchi" yoki "student" rolini va kirish vaqti cheklab ko'ramiz
//            if (($userRole == 'student' && $currentHour >= 8 && $currentHour < 17) || $userRole == 'teacher') {
//                // MQTT serveriga bog'lanish va mavzuga obuna bo'lish
//                $mqtt->ConnectAndPublish('Rahim121rus', "0", 'mqtt_citron', 'c1tr0nR&D');
//                echo "MQTT ulanuvchisi ochildi";
//            } else {
//                // MQTT ulanuvchisini yopish uchun "close" so'rovini yuborish
//                $mqtt->ConnectAndPublish('Rahim121rus', '0', 'mqtt_citron', 'c1tr0nR&D');
//                echo "MQTT ulanuvchisi yopildi";
//            }
//        } catch (\Exception $e) {
//            echo "MQTT serverga bog'lanishda xatolik yuz berdi: " . $e->getMessage();
//        }
//    }

//
////        try {
////
////            $mqtt = new Mqtt(); // Mqtt klassi obyektini yaratish
////            $mqtt->ConnectAndPublish('test/topic', 'Test xabar', 'mqtt_citron', 'c1tr0nR&D');
////            // MQTT serverga ulanish va xabar yuborish
////            echo "MQTT server bilan muvaffaqiyatli bog'landi va xabar yuborildi.";
////        } catch (\Exception $e) {
////            echo "MQTT serverga bog'lanishda xatolik yuz berdi: " . $e->getMessage();
////        }
//    }
//    public function subscribe($topic){
//        try {
//            // MQTT klientini yaratish
//            $mqtt = new Mqtt();
//
//            // Ma'lumotlarni tekshirish uchun foydalanuvchi rolini va soatni aniqlash
//            $userRole = Auth::user()->getRoleNames(); // foydalanuvchi roli
//            $currentHour = date('H'); // joriy soat: exp 15:00
//            $isOpen = false;
//
//            // Foydalanuvchi "o'qituvchi" yoki "student" rollaridan biriga ega bo'lsa va soat 13:00 dan 14:00 gacha bo'lsa, MQTT ulanuvchisini ochishga ruxsat berasiz
//            if (($userRole == 'student') && (8>$currentHour&&$currentHour<18)) {
//                // MQTT serveriga bog'lanish va mavzuga obuna bo'lish
//                $mqtt->ConnectAndPublish('test/topic', 'open', 'mqtt_citron', 'c1tr0nR&D');
//
//                $isOpen = true;
//            }else if(($userRole == 'teacher')){
//                $mqtt->ConnectAndPublish('test/topic', 'open', 'mqtt_citron', 'c1tr0nR&D');
//
//                $isOpen = true;
//            }
//
//            // MQTT ulanuvchisini ochish yoki yopish uchun so'rov yuborish
//            if ($isOpen) {
//                echo "MQTT ulanuvchi ochildi";
//            } else {
//                echo "Ruxsat berilmadi";
//                // MQTT ulanuvchisini yopish uchun "close" so'rovini yuborish
//                $mqtt->ConnectAndPublish($topic, 'close', 'mqtt_citron', 'c1tr0nR&D');
//                echo "MQTT ulanuvchisi yopildi";
//            }
//        } catch (\Exception $e) {
//            echo "MQTT serverga bog'lanishda xatolik yuz berdi: " . $e->getMessage();
//        }
//    }
}
