<?php 

$arr = ["Какая то сделка", "Еще одна сделка", "Новая сделка"];
// echo $arr[rand(0, 2)];


if (isset($_POST['send'])) {
	
	$leads['request']['leads']['add']=array(
	  array(
	    'name'=>$arr[rand(0, 2)],
	    //'date_create'=>1298904164, //optional
	    'status_id'=>14241031,
	    // 'price'=>300000,
	    // 'responsible_user_id'=>215302,
	    // 'tags' => 'Important, USA', #Теги
	    'custom_fields'=>array()
	  ),
	);

	curl_request('amocrm.ru/private/api/v2/json/leads/set', $leads);
}


 ?>