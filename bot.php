<?php 
$httpClient = new vendor\linecorp\line-bot-sdk\src\LINEBot\HTTPClient\CurlHTTPClient('7xGXQTgIeNebLt9q7UtuY8TdPI6T8eAx1WxsHp5i38siySOMQrZ5wyc0A1xUFpLQ9s7DErBfFTdmeM3Gw73Clgxb4wN5uWpfGNgU68VkOFZMBu9ss2axWxrwMLfVR1WSBl7r02mgEKMO2pA59QVgKwdB04t89/1O/w1cDnyilFU=');
$bot = new vendor\linecorp\line-bot-sdk\src\LINEBot($httpClient, ['channelSecret' => '	
d2a932fbcb794319177f57f78cdc9493']);
echo 'something';