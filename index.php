<?php
require_once 'vendor/autoload.php';

use YouTube\CountChannelSubscribers;

$api_key = 'your api key';
$channel_id = 'your channel id';

$subscribers = new CountChannelSubscribers($api_key, $channel_id);
$resultado = $subscribers->getSubscriberCount();
var_dump($resultado);