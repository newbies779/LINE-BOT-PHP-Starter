<?php
$path = __DIR__ . '/vendor/autoload.php';
require_once $path;

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('7xGXQTgIeNebLt9q7UtuY8TdPI6T8eAx1WxsHp5i38siySOMQrZ5wyc0A1xUFpLQ9s7DErBfFTdmeM3Gw73Clgxb4wN5uWpfGNgU68VkOFZMBu9ss2axWxrwMLfVR1WSBl7r02mgEKMO2pA59QVgKwdB04t89/1O/w1cDnyilFU=');

$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'd2a932fbcb794319177f57f78cdc9493']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage("U434e463205df5cd14b34922a38cb4c84", $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
// 
// $ch = curl_init('https://api.line.me/v1/profile');
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer 7xGXQTgIeNebLt9q7UtuY8TdPI6T8eAx1WxsHp5i38siySOMQrZ5wyc0A1xUFpLQ9s7DErBfFTdmeM3Gw73Clgxb4wN5uWpfGNgU68VkOFZMBu9ss2axWxrwMLfVR1WSBl7r02mgEKMO2pA59QVgKwdB04t89/1O/w1cDnyilFU='));
// $result = curl_exec($ch);
// curl_close($ch);

// echo $result . "\r\n";
