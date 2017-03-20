<?php 

// echo '<pre>';
// echo "leads";
$leads = curl_request('.amocrm.ru/private/api/v2/json/leads/list');
$leads = $leads['response']['leads'];
// print_r($leads);
// echo "links";
// print_r(curl_request('.amocrm.ru/private/api/v2/json/leads/list'));

 ?>