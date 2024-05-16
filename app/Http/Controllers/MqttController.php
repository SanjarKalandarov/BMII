<?php

namespace App\Http\Controllers;

use App\Services\MqttService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\MqttClient;
use Salman\Mqtt\MqttClass\Mqtt;


class MqttController extends Controller
{
    public function Connect()
    {

        $user = Auth::user();
        $startHour = 8;
        $endHour = 17;
        $currentHour = now()->hour;
        if ($user->getRoleNames()[0] == 'student' && $currentHour >= $startHour && $currentHour < $endHour) {

            try {
                $mqtt = new Mqtt();
                $mqtt->ConnectAndPublish('Rahim121rus', '1', 'mqtt_citron', 'c1tr0nR&D');
                return response()->json(['status' => 'success', 'message' => 'Eshik ochildi!']);

            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'MQTT serveriga 1-xabar yuborilmadi: ' . $e->getMessage()]);
            }
        }
        else if ($user->getRoleNames()[0] == 'teacher') {

            try {
                $mqtt = new Mqtt();
                $mqtt->ConnectAndPublish('Rahim121rus', '1', 'mqtt_citron', 'c1tr0nR&D');
                return response()->json(['status' => 'success', 'message' => 'Eshik ochildi!']);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'MQTT serveriga 1-xabar yuborilmadi: ' . $e->getMessage()]);
            }
        }
        else {
//            return 'salom';
            return response()->json(['status' => 'error', 'message' => 'Siz faqa 8 va 17 gacha kira olasiz!']);


        }



    }

    public function sendZeroMessage()
    {
        try {
            $mqtt = new Mqtt();
            $mqtt->ConnectAndPublish('Rahim121rus', '0', 'mqtt_citron', 'c1tr0nR&D');
            return response()->json(['success','Eshik Yopildi']);
        } catch (\Exception $e) {
            return response()->json(['error','MQTT serveriga 0-xabar yuborilmadi: ' . $e->getMessage()]);
        }
    }

//    public function connected()
//    {
//        try {
//            // Ma'lumotlarni qabul qilish
//
//            // MQTT ulanuvchisini yaratish
//            $mqtt = new Mqtt();
//
//                // MQTT ulanuvchisi ochiladi
//                $mqtt->ConnectAndPublish('Rahim121rus', '1', 'mqtt_citron', 'c1tr0nR&D');
////
//        } catch (\Exception $e) {
//            // Xatolikni qaytarish
//            return response()->json(['error' => 'MQTT serverga bog\'lanishda xatolik yuz berdi: ' . $e->getMessage()]);
//        }
//    }







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
