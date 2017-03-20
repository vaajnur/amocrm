<?php 

$tasks = curl_request('amocrm.ru/private/api/v2/json/tasks/list');
$tasks = $tasks['response']['tasks'];
// echo "<pre>";
// print_r($tasks);

 ?>