<?php 


function curl_request($url, $data = null){ 
  $subdomain='new58cf9025849d6'; #Наш аккаунт - поддомен
   
  if(strpos($url, '.') != 0)
    $url = '.'.$url;
  #Формируем ссылку для запроса
  $link='https://'.$subdomain.$url;

  $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
  #Устанавливаем необходимые опции для сеанса cURL
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
  curl_setopt($curl,CURLOPT_URL,$link);
  if(isset($data)){
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
    curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($data));
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
  }
  curl_setopt($curl,CURLOPT_HEADER,false);
  curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
  if(!file_exists('cookie.txt') || filemtime('cookie.txt') + 60*15 < time())
  	curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
  curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
   
  $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
  $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
  curl_close($curl); #Завершаем сеанс cURL
  $code=(int)$code;
  $errors=array(
    301=>'Moved permanently',
    400=>'Bad request',
    401=>'Unauthorized',
    403=>'Forbidden',
    404=>'Not found',
    500=>'Internal server error',
    502=>'Bad gateway',
    503=>'Service unavailable'
  );
  try
  {
    #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
    if($code!=200 && $code!=204)
      throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
  }
  catch(Exception $E)
  {
    echo('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode())."<br>";
  }
   
  /**
   * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
   * нам придётся перевести ответ в формат, понятный PHP
   */
  // var_dump($out);
  $Response=json_decode($out,true);
  // var_dump($Response);
  // $Response=$Response['response'];
  if(isset($Response['response'])){
  #Флаг авторизации доступен в свойстве "auth"
    echo 'Авторизация прошла успешно'."<br>";
    return $Response;
    // print_r($Response);
  } 
  else{
  	echo 'Авторизация не удалась'."<br>";
  }

}

 ?>