<?php
include_once('simple_html_dom.php'); 

function curl_get($url, $referer = 'http://www.google.com'){ 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 				//url для парсинга
	curl_setopt($ch, CURLOPT_HEADER, 0); 				//не получать заголовки
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0');	//втыкаем браузер
	curl_setopt($ch, CURLOPT_REFERER, $referer); //говорим что мы пришли с http://www.google.com
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$data = curl_exec($ch); //пишем ответ сервера в массив $data
	curl_close($ch);
	return $data;
}

//В $html пишем ссылку на страницу для парсинга
$html = curl_get('http://www.cbr.ru/currency_base/daily/');
//echo $html;
$dom = str_get_html($html); //simple_html_dom.php, пишем html в пямять php
//var_dump($html);
$srings = $dom->find('td'); //ищем по тегам: h3, div; классу: .cards, .text; id: #card, #button;
$i = 0;
foreach($srings as $string){ //тут просто для примера вывел циклом массив с элементами которые спарсились выше
	echo $i++ . ') ' . $string .'</br>';
}
?>