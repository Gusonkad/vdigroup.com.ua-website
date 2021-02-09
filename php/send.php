<?php
$to = "vdibroker@ukr.net,podolian.ir@ukr.net,orders@vdigroup.com.ua,gusonkad@meta.ua"; //Поштова скринька куди відправляється повідомлення
$subject = "Новий запит з Вашого сайту vdigroup.com.ua"; //Тема повідомлення
$request = "Message, сообщение!"; //Сам текст листа
$headers = "Content-type: text/plain; charset=utf-8 \r\n";
//Містить інф. кому і куди відповідати на листа
// Робимо перевірку методу POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // По черзі перевіряємо чи були передані дані з форм і чи не були вони пусті
  if (isset($_POST["name"])) {
    // Якщо параметр є то присвоюємо йому передаване значення
    $name = trim(strip_tags($_POST["name"]));

    if (isset($_POST["email"])) {
      $email = trim(strip_tags($_POST["email"]));
    }
    if (isset($_POST["request"])) {
      $request = trim(strip_tags($_POST["request"]));
    }

    // Формуємо текст повідомлення
    $message  = "\n";
    $message  .= "Від кого: "; //Початок повідомлення,
    $message  .= "\n";
    $message  .= "Ім'я: " . $name;
    $message  .= "\n";
    $message  .= "Email: " . $email;
    $message  .= "\n";
    $message  .= "Текст повідомлення: "; //Шапка повідомлення,
    $message  .= "\n";
    $message  .= $request;
    $message  .= "\n";
    $headers  .= 'From: orders@vdigroup.com.ua' . "\r\n";

    // Закінчуємо формування тіла повідомлення та виводимо на екран повідомлення статусу
    if (mail($to, $subject, $message, $headers)) {
      echo "<h1 align='center'> <font color=green size='26pt'> Ваше повідомлення надіслано!</h1>";
      echo "<a href=\"javascript:history.go(-1)\"> <p align='center'> <font color=blue size='18pt'>ПОВЕРНУТИСЯ НАЗАД</p></a>"; 
      // header("Location: https://www.vdigroup.com.ua");
      {

}
    } else {
      echo "<p align='center'> <font color=red size='30pt'> Сталася помилка!</p>";
      // header("Location: https://www.vdigroup.com.ua");
      echo "<a href=\"javascript:history.go(-1)\"> <p align='center'> <font color=blue size='18pt'>ПОВЕРНУТИСЯ НАЗАД</p></a>"; 
    }
  }
} else {
  exit;
}
