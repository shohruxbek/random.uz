<?

define('API_KEY','');

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
$mesid = $message->message_id;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$username = $message->from->username;//useradresi
$first_name = $message->from->first_name;//ismi
$callback = $update->callback_query;
$username2 = $callback->message->from->username;
$first_name2 = $callback->message->from->first_name;
$message_id2 = $callback->message->message_id;
$data = $update->callback_query->data;
$cqid = $update->callback_query->id;
$chat_id2 = $update->callback_query->message->chat->id;
$cid = $callback->from->id;
$imid = $callback->inline_message_id;
$soat = date('H:i', strtotime('5 hour'));
$kun = date ('d.m.Y', strtotime('5 hour'));
$cap2 = $update->callback_query->message->caption;



$folder1="chat";


$p =explode("*", file_get_contents("chat/$chat_id.txt"));
$qadam = $p[0];
$raqam = intval($p[1]);


if($text == "/start"){ 
	file_put_contents("chat/$chat_id.txt", 'bm*0');
           bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'text'=>"Tanlang",
	       'parse_mode'=>"html",
               'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['callback_data'=>"90","text"=>"+99890"]],
[['callback_data'=>"91","text"=>"+99891"]],
[['callback_data'=>"93","text"=>"+99893"]],
[['callback_data'=>"94","text"=>"+99894"]],
[['callback_data'=>"98","text"=>"+99898"]],
[['callback_data'=>"99","text"=>"+99899"]]
]
])
]);
       }

if($data){
	file_put_contents("chat/$chat_id2.txt", "gn*$data");
	bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"Telefon raqam boshlanishini yuboring (100<X<1000)"
	]);
}

if($text && $qadam=="gn"){
	sa($chat_id,$raqam,$text);
}


function sa($chat_id,$raqam,$text){
for($i=0;$i<=10;$i++){
	$ter1 = rand(1000,9999);
bot('sendContact',[
'chat_id'=>$chat_id,
'phone_number'=>"+998{$raqam}{$text}{$ter1}",
'first_name'=>"+998{$raqam}{$text}{$ter1}"
]);
}}











/*           $d="";
for($i=0;$i<=2000;$i++){
	$ter1 = rand(100000,999999);
	$d.="
BEGIN:VCARD
VERSION:2.1
N:;{$i}_{$ter1};;;
FN:{$i}_{$ter1}
TEL;CELL:+998995{$ter1}
END:VCARD";
}
$myfiles = fopen("97-9.vcf", "w");
fwrite($myfiles, $d);
fclose($myfiles);
}*/

?>