 <?php
$to = "yourmail@gmail.com"; // емайл получателя данных из формы
$tema = "Форма обратной связи на PHP"; // тема полученного емайла
$headers  = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
$name = clear_data($_POST['name']);
$email = clear_data ($_POST['email']);
$phone = clear_data ($_POST['phone']);
$text = clear_data ($_POST['message']);



function clear_data ($val) {

  $val = trim($val);
  $val = stripslashes($val);
  $val = htmlspecialchars($val);

  return $val;
}

// echo $name . $email . $phone . $text;

$message = '
<html>
<body>
<table border="1" cellpadding="6" cellspacing="0" width="90%" bordercolog="#DBDBDB">
<tr> <td colspan="2" align="center" bgcolor="#E4E4E4">Информация о клиенте</td></tr>
';

$message .= "
<tr>
<td><b> Имя клиента </b></td>
<td><i>  $name  </i></td>
</tr>
<tr>
<td><b> Почта клиента </b></td>
<td><i> . $email . </i></td>
</tr>
<tr>
<td><b> Номер телефона </b></td>
<td><i> . $phone . </i></td>
</tr>
<tr>
<td><b> Сообщение </b></td>
<td><i> . $text . </i></td>
</tr>
</table>
"
;
mail($to, $tema, $message, $headers); //отправляет получателю на емайл значения переменных
var_dump(mail($to, $tema, $message, $headers));

$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");
exit();
?>