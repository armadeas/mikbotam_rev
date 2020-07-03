<?php

date_default_timezone_set('Asia/Jakarta');

//config mikrotik
//config sekarang ada di folder config :D
//edit file yang berada di folder config.php

include('./config/config.php');
//include
require_once 'src/FrameBot.php';
$bot = new FrameBot($datasa['token'], $datasa['usernamebot']);
require_once ('./include/formatbytesbites.php');
require_once ('./include/routeros_api.class.php');
//fungsi


global $datasa;
$mikrotik_ip = $datasa['ipaddress'];
$mikrotik_port		 = $datasa['port'];
$mikrotik_username = $datasa['user'];
$mikrotik_password = $datasa['password'];
$API = new routeros_api();

if (!$API->connect($mikrotik_ip, $mikrotik_username, $mikrotik_password, $mikrotik_port)) {
	// $texta = "👨‍💻 Mikrotik Linken's Sphere Offline\nSegera Periksa Jaringan";
	// Bot::sendMessage($texta);

	$telegrambot='1134655529:AAFa_Czx2IK4rZQTbvj-34oJWBlT7UrxlBo';
	$telegramchatid=-429836854;
	$msg = "👨‍💻 Mikrotik Linken's Sphere Offline\nSegera Periksa Jaringan";

	// $url="https://api.telegram.org/bot1134655529:AAFa_Czx2IK4rZQTbvj-34oJWBlT7UrxlBo/sendmessage\?chat_id=-429836854&text=Mikrotik Linken's Sphere Offline\nSegera Periksa Jaringan \E2\9D\8C ";
	 $url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';
	 $data=array('chat_id'=>$telegramchatid,'text'=>$msg);

	$options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
    $context=stream_context_create($options);
    $result=file_get_contents($url,false,$context);
}
