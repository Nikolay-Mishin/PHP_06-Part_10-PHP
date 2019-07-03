<?php 
include_once ('views/function.php');

echo "<strong>_POST array:</strong> <br>";
print_r($_POST);
echo "<br><br><br>";

if (!empty($_POST)) {

	$message = "Вам пришло новое сообщение с сайта: \n " 
	. "Имя отправителя: " . $_POST['userName'] . "\n"
	. "Email отправителя: " .  $_POST['userEmail'] . "\n"
	. "Сообщение: \n  " . $_POST['message'];

	$headers = "From: info@test-mail.ru"; // от кого письмо для почтового клиента(должно совпадать с доменным именем сайта)

	$resultMail = mail("info@mail.ru", "Сообщение с сайта", $message, $headers );

	if ( $resultMail ) {
		$msg = "Сообщение отправлено успешно!";
	} else {
		$msg = "Что то пошло не так. Письмо не отправлено.";
	}
}

view('templates/forms/index.html', compact('msg')); 

?>