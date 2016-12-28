<?php 
$access_token = '7xGXQTgIeNebLt9q7UtuY8TdPI6T8eAx1WxsHp5i38siySOMQrZ5wyc0A1xUFpLQ9s7DErBfFTdmeM3Gw73Clgxb4wN5uWpfGNgU68VkOFZMBu9ss2axWxrwMLfVR1WSBl7r02mgEKMO2pA59QVgKwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
echo 'updated';
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			$exploded_text = explode(':', $text);
			if($exploded_text[0] == 'bot'){
				//Ask for UID or GID
				if(strtolower($exploded_text[1]) == 'giveid'){
					if(isset($event['source']['userId'])){
						$mes = $event['source']['userId'];
					}else if(isset($event['source']['groupId'])){
						$mes = $event['source']['groupId'];
					}else{
						$mes = 'No userId or groupId';
					}
				}
				//Ask wiki
				if(strtolower($exploded_text[1]) == 'wiki'){
					$ch1 = curl_init(); 
					curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false); 
					curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true); 
					curl_setopt($ch1, CURLOPT_URL, 'https://th.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$exploded_text[2]);
					$result1 = curl_exec($ch1); 
					curl_close($ch1); 
					$obj = json_decode($result1, true); 

					foreach($obj['query']['pages'] as $key => $val){ 
						$mes = $val['extract']; 
					}
					//If th doesn't have information
					if(empty($mes)){
						$ch1 = curl_init(); 
						curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false); 
						curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true); 
						curl_setopt($ch1, CURLOPT_URL, 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$exploded_text[2]); 
						$result1 = curl_exec($ch1); 
						curl_close($ch1); 
						$obj = json_decode($result1, true); 

						foreach($obj['query']['pages'] as $key => $val){ 
							$mes = $val['extract']; 
						} 
					} if(empty($mes)){
						$mes = 'ไม่พบข้อมูล'; 
					}
				}
				//Ask weather
				if(strtolower($exploded_text[1] == 'weather')){
					$ch1 = curl_init(); 
					curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false); 
					curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true); 
					curl_setopt($ch1, CURLOPT_URL, 'http://api.wunderground.com/api/c725528b02d87d0a/forecast/lang:TH/q/Thailand/'.str_replace(' ', '%20', $exploded_text[2]).'.json'); 
					$result1 = curl_exec($ch1); 
					curl_close($ch1); 
					$obj = json_decode($result1, true); 

					if(isset($obj['forecast']['txt_forecast']['forecastday'][0]['fcttext_metric'])){ 
						$mes = $obj['forecast']['txt_forecast']['forecastday'][0]['fcttext_metric']; 
					}else{
						$mes = 'ไม่พบข้อมูล'; 
					}
				}
			}



			// Build message to reply back
			$messages = [
			'type' => 'text',
			'text' => $mes
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
			'replyToken' => $replyToken,
			'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}