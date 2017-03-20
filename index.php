<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>amocrm</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 

require_once 'curl_request.php';

/**
 * connect
 * [$key description]
 * @var string
 */
$key = '65407fbbc9dd1861e80e830d0f90c6b4';
$user=array(
  'USER_LOGIN'=>'ainur.valiev1@gmail.com', #Ваш логин (электронная почта)
  'USER_HASH'=>$key #Хэш для доступа к API (смотрите в профиле пользователя)
);

if(!file_exists('cookie.txt') || filemtime('cookie.txt') + 60*15 < time())
  curl_request('amocrm.ru/private/api/auth.php?type=json', $user);

/** пользо-ль */
require_once 'account_current.php';
/** кастом. поля */
require_once 'fields_info.php';
/**  */
require_once 'add_contact.php';
/**  */
require_once 'leads_add.php';
require_once 'leads_list.php';
/**  */
require_once 'tasks_set.php';
require_once 'tasks_list.php';


 ?>
 <div class="container">
	<form action="" method="post" name="">
		 <div class="form-group"><label for="">Имя<input class="form-control" type="text" name="name" required></label>
	</div>	
  <div class="form-group"><label for="">Телефон<input class="form-control" type="text" name="phone" required></label></div>
		<div class="form-group"><label for="">E-mail<input class="form-control" type="text" name="email" required></label>
</div>		
<div class="form-group"><label for="">Комментария<textarea class="form-control" name="comment" id="" cols="30" rows="10" required></textarea></label></div>
<div class="form-group">		<input class="form-control"type="submit" name="send" id=""></div>	
	</form>
	</div>
<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      	<? $arr = [$leads, $tasks, $account];
      	echo "<pre>";
      	print_r($arr[array_rand($arr, 1)]); 
      	echo "</pre>";
      	?>
    </div>
  </div>
</div>
  ...
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>