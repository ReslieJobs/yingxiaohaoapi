<head>

<title>营销号生成器api</title>

</head>

<?php

header("Content-type: text/html; charset=utf-8");

header("Access-Control-Allow-Origin:*");

header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

header('Access-Control-Allow-Headers:x-requested-with,content-type');

$uri = $_SERVER['REQUEST_URI'];

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ?

    "https://": "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$mood = $_GET['mood']?$_GET['mood']:'0';

$mainThing = $_GET['mainThing']?$_GET['mainThing']:'0';

$event = $_GET['event']?$_GET['event']:'0';

$withWhat = $_GET['withWhat']?$_GET['withWhat']:'0';

$adj = $_GET['adj']?$_GET['adj']:'0';

if($mood == '0' || $mainThing == '0' || $event == '0' || $withWhat == '0' || $adj == '0'){
	
		$err[0] = 'err:参数有误！<br>请按照以下设置对应参数进行请求即可获得结果：<br>mood:语气词,比如“震惊”，不要带语气标点符号<br>mainThing:主体物<br>event:事件,类似于：“混着一起吃”、“重复使用”等等<br>withWhat:与什么...（第二主体）,类似于：{主体物}不能与{与什么...}{事件}<br>adj:定语,类似于“千万不要”，“绝对不能”...<br>完整链接：'.$url.'?mood=语气词&mainThing=主体物&event=事件&withWhat=与什么&adj=定语';
		
		echo $err[0];
		
} else {
	
	$contentTitle = $mood . '！' . $mainThing . $adj .  '和' . $withWhat . $event . '！' . "原因竟然是...";

	$content = $mainThing . '为什么不能与' . $withWhat . $event . '，' . '这究竟是怎么回事呢？' . $mainThing . '相信大家很熟悉吧，但是不能与' . $withWhat . $event . '是怎么回事呢？下面就让小编带着大家一起去了解吧。\n' . $mainThing . '不能与' . $withWhat . $event . '，其实就是' . $mainThing . '不能与' . $withWhat . $event . '。大家可能会感到很惊讶，' . $mainThing . '为什么' . $adj . '与' . $withWhat . $event . '。\n' . '这些就是' . $mainThing . '为什么' . $adj . '与' . $withWhat . $event . '的全部内容了。大家有什么想法呢，欢迎在评论区里与小编留言互动哦~我们下期再见！';
	
    $result = array();
    
    array_push($result,$contentTitle);
    
    array_push($result,$content);
    
    exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    
}

?>