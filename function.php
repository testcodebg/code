<?php
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".$GLOBALS['token']."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function send($text,$mode = null){
	bot('sendMessage',[
'chat_id'=>$GLOBALS['chat_id'],
'text'=>$text,
'parse_mode'=>$mode,
 'reply_to_message_id'=>$GLOBALS['message_id'],
]);
	}
	function senda($text,$mode = null){
	bot('sendMessage',[
'chat_id'=>$GLOBALS['admins'][0],
'text'=>$text,
'parse_mode'=>$mode,
]);
	}
	function get($url){
		$https = file_get_contents($url);
		return $https;
		}
	function edit($text,$keyboard = null,$mode = null){
		$json = json_encode(['inline_keyboard'=>$keyboard]);
		bot('EditMessageText',[
        'chat_id'=>$GLOBALS['chat_id'],
        'message_id'=>$GLOBALS['message_id'],
        'text'=>"
$text
",
'reply_markup'=>($json),
'parse_mode'=>$mode,
	]);
		}
	function photo($photoid,$caption = null,$mode = null){
		bot('sendphoto', [
'chat_id'=>$GLOBALS['chat_id'],
'photo'=>$photoid,
'caption'=>$caption,
'parse_mode'=>$mode,
]);
		}
		function video($video_id,$caption = null,$mode = null){
			bot('Sendvideo',[
'chat_id'=>$GLOBALS['chat_id'],
'video'=>$video_id,
'caption'=>$caption,
'parse_mode'=>$mode,
]);
			}
	function sticker($sticker_id){
		bot('Sendsticker',[
'chat_id'=>$GLOBALS['chat_id'],
'sticker'=>$sticker_id,
]);
		}
	function document($file_id,$caption = null){
		bot('SendDocument',[
'chat_id'=>$GLOBALS['chat_id'],
'document'=>$file_id,
'caption'=>$caption,
]);
		}
	function audio($music_id,$caption = null,$mode = null){
		bot('Sendaudio',[
'chat_id'=>$GLOBALS['chat_id'],
'audio'=>$music_id,
'caption'=>$caption,
'parse_mode'=>$mode,
]);
		}
	function voice($voice_id,$caption = null,$mode = null){
		bot('Sendvoice',[
'chat_id'=>$GLOBALS['chat_id'],
'voice'=>$voice_id,
'caption'=>$caption,
'parse_mode'=>$mode,
]);
		}
	function jsonget($url){
		$json = json_decode(file_get_contents($url));
		return $json;
		}
	