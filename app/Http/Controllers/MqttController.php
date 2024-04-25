<?php

namespace App\Http\Controllers;

use App\Services\MqttService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\Exceptions\ConfigurationInvalidException;
use PhpMqtt\Client\Exceptions\ConnectingToBrokerFailedException;
use PhpMqtt\Client\Exceptions\DataTransferException;
use PhpMqtt\Client\Exceptions\ProtocolNotSupportedException;
use PhpMqtt\Client\MqttClient;
use Salman\Mqtt\MqttClass\Mqtt;


class MqttController extends Controller
{
    public function connect()
    {
        try {

            $mqtt = new Mqtt(); // Mqtt klassi obyektini yaratish
            $mqtt->ConnectAndPublish('topic', 'Test xabar', 'mqtt_citron', 'c1tr0nR&D');
            // MQTT serverga ulanish va xabar yuborish
            echo "MQTT server bilan muvaffaqiyatli bog'landi va xabar yuborildi.";
        } catch (\Exception $e) {
            echo "MQTT serverga bog'lanishda xatolik yuz berdi: " . $e->getMessage();
        }

}
}
