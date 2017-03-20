<?php 

// echo date('Y-m-d H:i:s', time()+60*60*24);
// die(0);
// echo $account['id'];
if(isset($_POST['send'])){
	$tasks['request']['tasks']['add']=array(
  #Привязываем к сделке
  array(
    'element_id'=>$leads[0]['id'], #ID сделки
    'element_type'=>2, #Показываем, что это - сделка, а не контакт
    'task_type'=>1, #Звонок
    'text'=>'Задача №1',
    // 'responsible_user_id'=>109999,
    'complete_till'=>time()+60*60*24 // на завтра
  )
  );
	$res = curl_request('.amocrm.ru/private/api/v2/json/tasks/set', $tasks);
}

 ?>