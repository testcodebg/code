<?php
$Token = '1182423215:AAHmZkPsa_g0v5Ca-d6iIz2yxPeFmfBmvqM';
define('API_KEY',$Token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
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
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$user_2 = $update->callback_query->from->username;
$name_2 = $update->callback_query->from->first_name;
$id_2 = $update->callback_query->from->id;
$message_id =  $message->message_id;
$mid = $message->message_id;
$name = $message->from->first_name;
$user = $message->from->username;
$id = $message->from->id;
$sudo = 961743188;

if($from_id == $sudo){
$getclone = explode('clone ',$text);
if($getclone[0] == "git " and $getclone[1]){
if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$getclone[1])){

bot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile("$getclone[1]"),
'caption'=>$caption,
]);
}
}}

if($text == "/start" and $id != $sudo){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"[$name](tg://user?id=$id) ❤️
*آسف هذا البوت ليس لك* 😕",
  'disable_web_page_preview'=>'true',
  'parse_mode'=>"MarkDown"
]);
bot('sendMessage',[
    'chat_id'=>$sudo,
    'text'=>"[$name](tg://user?id=$id) 🌚",
  'disable_web_page_preview'=>'true',
  'parse_mode'=>"MarkDown"
]);
}
$php = str_replace("/php ", "$php", $text);
if($text == "/php $php" and $id == $sudo){
file_put_contents("php.php","<?php $php ?>");
    bot('sendmessage',[
      'chat_id'=>$chat_id,
      'text'=>"*تم رفع الكود بنجاح  ✅*" ,
      'parse_mode'=>"Markdown",
      ]);
      }
if($text == "/php" and $id == $sudo or $text == "/php@VVVFSA_bot" and $id == $sudo){
unlink("php.php");
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"*Director :* [$name](tg://user?id=$id) ❤️

*لقد أوقفت الكود بنجاح* ✅",
  'parse_mode'=>"MarkDown",
]);
}
if($text == "/rest" and $id == $sudo or $text == "/rest@VVVFSA_bot" and $id == $sudo){
$code = file_get_contents("codee.php");
file_put_contents("code.php", "$code");
unlink("php.php");
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"*سيزيل الأخطاء الآن....* 🗑",
  'parse_mode'=>"MarkDown",
]);
sleep(20);
$code = file_get_contents("codeee.php");
file_put_contents("code.php", "$code");
unlink("php.php");
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"*انتهى الأمر بإزالة جميع الأخطاء بنجاح* ✅",
  'parse_mode'=>"MarkDown",
]);
}
include "php.php";


/*
<?php
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
$ipok = explode(".",$ip);
if($ipok[0] != "91" and $ipok[1] != "108"){exit();}

$token = "1182423215:AAHgshu9th9ZhuYchwoDqYJ5z4oi4B81xEM";
//echo file_get_contents("https://api.telegram.org/bot" . $token . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
include "update.php";
include "function.php";
include "admin.php";
$test = str_replace("نفذ ","",$text);
if($text == "نفذ $test" and preg_match("/(;)/", $text) and $from_id == $admins[0]){
	$text = str_replace(['ادمن','أدمن','admin','admins'],'in_array($from_id,$admins)',$text);
	send('تم رفع الكود بنجاح ✓');
	file_put_contents("test.php",'<?php '.$test.' ?>');
	if(preg_match("/(echo)/", $text)){
		send("[Click Here 🌐](https://alsh-bg.ml/AX/AX_3/test.php)",'MarkDown');
		}
}
if($text != "حذف" and $from_id == $admins[0]){
 include "test.php";
	}
	if($text == 'حذف' and $from_id == $admins[0]){
		if(is_file('test.php')){
		send('تم حذف الملف بنجاح ✓');
unlink('test.php');
}else{
	if(in_array($from_id,$admins)){
		send('عذرا لا يوجد اي ملف للحذف !');
		}
	}
}
$code = str_replace("رفع ","",$text);
if($text == "رفع $code" and preg_match("/(;)/", $text) and $from_id == $admins[0]){
	send('تم رفع الكود بنجاح ✓');
	if(!is_file('code.php')){
		file_put_contents("code.php",'<?php'."\n");
		}
	file_put_contents("code.php",$code."\n",FILE_APPEND);
}
$del = str_replace("مسح ","",$text);
if($text == "مسح $del" and preg_match("/(;)/", $text) and $from_id == $admins[0]){
	$get = get("code.php");
		$a = str_replace("$del","",file_get_contents("code.php"));
        $ok = file_put_contents("code.php",$a);
		send('تم مسح الكود بنجاح ✓');
}
include "code.php";
if($from_id == $admin){
$getclone = explode('clone ',$text);
if($getclone[0] == "git " and $getclone[1]){
document(new CURLFile("$getclone[1]"),'');
}
}
if($from_id != $admin){
$getclone = explode('clone ',$text);
if($getclone[0] == "git " and $getclone[1]){
if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$getclone[1])){
document(new CURLFile("$getclone[1]"),'تابعنا 🍃 @ALSH_3K ✨');
}}
}
*/