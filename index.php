<?php

require_once __DIR__ . '/composer' . '/autoload_real.php';

return ComposerAutoloaderInit7c6ceef18bfc41a67908c60498567f5c::getLoader();

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('7xGXQTgIeNebLt9q7UtuY8TdPI6T8eAx1WxsHp5i38siySOMQrZ5wyc0A1xUFpLQ9s7DErBfFTdmeM3Gw73Clgxb4wN5uWpfGNgU68VkOFZMBu9ss2axWxrwMLfVR1WSBl7r02mgEKMO2pA59QVgKwdB04t89/1O/w1cDnyilFU=');
var_dump($httpClient);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'd2a932fbcb794319177f57f78cdc9493']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('reddamnapple', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
