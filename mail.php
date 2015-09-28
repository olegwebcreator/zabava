<?php
	@ini_set('display_errors', false);
	@ini_set('html_errors', false);
	$i=0;
	$exitform = '';
	
	define ( 'ROOT_DIR', dirname ( __FILE__ ) );
	$sendto = "ivan@zabava-group.ru, salon@zabava-group.ru, fantasticos@mail.ru";
	$subject  = "Обращение с SALONZABAVA.COM";
	
	$headers  = "From: no-reply@zabava-group.ru\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
	
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	
	foreach ($_REQUEST as $exit=>$exitname) {
		$exitform .=
<<<HTML
	<br />
	{$exit}: <b>{$exitname}</b>
HTML;
	}
	$msg  = "<b><div align='center'>";
	$msg  .= $phone;
	$msg  .= "</div></b>";
	$msg  .= $exitform;
	
	if(mail($sendto, $subject, $msg, $headers)) { 
		mail($sendto, $subject, $msg, $headers);
		echo "<h1>Спасибо за заявку! Мы позвоним Вам в ближайшее время</h1>";
	} else { 
		echo "<h1>Произошла <span style='color: red;'>ошибка</span> при отправке сообщения. Но вы всегда можете нам позвонить по номеру <a href='tel:+78122948500'>+7 (812) 294-85-00</a></h1>";
	}
?>