<?php 

if (isset($_POST['send'])) {
	

	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$comment = isset($_POST['comment']) ? $_POST['comment'] : null;

	$contacts['request']['contacts']['add']=array(
	  array(
	    'name'=>$name, #Имя контакта
	    //'last_modified'=>1298904164, //optional
	    'linked_leads_id'=>array( #Список с айдишниками сделок контакта
	    ),
	    'company_name'=>'amoCRM', #Наименование компании
	    'tags' => 'Important, Russia', #Теги
	    'custom_fields'=>array(
	      #Должность
	      array(
	        'id'=>$custom_fields['POSITION'],
	        'values'=>array(
	          array(
	            'value'=>'сотрудник'
	          )
	        )
	      ),
    	  array(
	        #E-mails
	        'id'=>$custom_fields['EMAIL'],
	        'values'=>array(
	          array(
	            'value'=>$email,
	            'enum'=>'WORK', #Рабочий
	          ),
	          array(
	            'value'=>$email,
	            'enum'=>'PRIV',
	          ),
	          array(
	            'value'=>$email,
	            'enum'=>'OTHER',
	          )
	        )
	      ),
	      array(
	      	'id' => $custom_fields['PHONE'],
	      	'values' => array(
	      		array('value' => $phone, 'enum'=>'OTHER')
	      	)
	      )
	     ),
	    )
	  );

	curl_request('.amocrm.ru/private/api/v2/json/contacts/set', $contacts);



}

// echo "<pre>";
// print_r($custom_fields);

 ?>