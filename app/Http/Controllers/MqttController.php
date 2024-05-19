<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Salman\Mqtt\MqttClass\Mqtt;

class MqttController extends Controller
{
    public function Connect(Request $request)
    {
//        dd($request);
        $user = Auth::user();
        $currentHour = now()->hour;
        $startHour = 8;
        $endHour =17;
//dd(1);
        if ($user->getRoleNames()->first() == 'teacher') {
            try {
//                dd(1);
                $mqtt = new Mqtt();
                $mqtt->ConnectAndPublish('Rahim121rus', '1', 'mqtt_citron', 'c1tr0nR&D');
//                return response()->json(['status' => 'success', 'message' => 'Eshik ochildi!']);
                return redirect()->back()->with('success', 'Eshik ochildi!');
            } catch (\Exception $e) {
//                return response()->json(['status' => 'error', 'message' => 'MQTT serveriga 1-xabar yuborilmadi: ' . $e->getMessage()]);
                return redirect()->back()->with('error', 'Xatolik yuz berdi!');
            }
        } elseif ($user->getRoleNames()->first() == 'student') {
            if ($currentHour >= $startHour && $currentHour < $endHour) {
                try {
                    $mqtt = new Mqtt();
                    $mqtt->ConnectAndPublish('Rahim121rus', '1', 'mqtt_citron', 'c1tr0nR&D');
//                    return response()->json(['status' => 'success', 'message' => 'Eshik ochildi!']);
                    return redirect()->back()->with('success', 'Eshik ochildi!');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Xatolik yuz berdi');
                }
            } else {
//                return response()->json(['status' => 'error', 'message' => 'Faqat 8 dan 19 gacha ruxsat etiladi!']);
                return redirect()->back()->with('error', 'Siz faqat 8 va 17 gacha kira olasiz!');            }
        } else {
//            return response()->json(['status' => 'error', 'message' => 'Faqat talabalarga va o\'qituvchilarga ruxsat etiladi!']);
            return redirect()->back()->with('error', 'Faqat talabalarga va o\'qituvchilarga ruxsat etiladi!');
        }
    }

    public function sendZeroMessage()
    {
        try {
            $mqtt = new Mqtt();
            $mqtt->ConnectAndPublish('Rahim121rus', '0', 'mqtt_citron', 'c1tr0nR&D');
//            return response()->json(['status' => 'success', 'message' => 'Eshik yopildi!']);
                            return redirect()->back()->with('error', 'Eshik yopildi!');

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'xatolik 0 ketmay qoldi: ' . $e->getMessage()]);
        }
    }
}


?>
