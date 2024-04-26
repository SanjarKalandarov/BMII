<?php
// app/Services/MqttService.php

namespace App\Services;

use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\MqttClient;
use Illuminate\Support\Facades\Log;

class MqttService
{
    protected $client;

    public function __construct()
    {
        $this->client = MQTT::connection();
    }

    public function publish($topic, $message)
    {
        $this->client->publish($topic, $message);
    }

    public function subscribe($topic, $callback)
    {
        $this->client->subscribe($topic, function ($topic, $message) use ($callback) {
            $callback($topic, $message);
        });
    }
}
