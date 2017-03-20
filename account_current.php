<?php 


$url = '.amocrm.ru/private/api/v2/json/accounts/current';

$Response=curl_request($url);
// var_dump($Response);
$account=$Response['response']['account'];
// echo "<pre>";
// print_r($account);

 ?>