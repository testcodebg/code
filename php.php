<?php $K=json_decode(file_get_contents("https://alsh-ax.ml/api/YouTube/v1/mp3.php?url=".$text),true)['url'];
if($text){
$S=file_get_contents($K);
file_put_contents("$chat_id.mp3",$S);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جاري.. ",
]);
 bot('sendaudio',[ 'chat_id'=>$chat_id,
      'audio'=>new CURLFile("$chat_id.mp3")
     ]);
unlink("$chat_id.mp3");
} ?>