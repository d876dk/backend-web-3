<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }
  // Включаем содержимое файла form.php.
  include('form.php');
  // Завершаем работу скрипта.
  exit();
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.

// Проверяем ошибки.
$errors = FALSE;
if (empty($_POST['fio'])) {
  print('Заполните имя.<br/>');
  $errors = TRUE;
}
if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  print('Заполните почту правильно.<br/>');
  $errors = TRUE;
}
if (empty($_POST['year']) || !is_numeric($_POST['year']) || !preg_match('/^\d+$/', $_POST['year'])) {
  print('Заполните год.<br/>');
  $errors = TRUE;
}
if (empty($_POST['biografy'])) {
  print('Заполните биографию.<br/>');
  $errors = TRUE;
}
if (empty($_POST['ability'])) {
  print('Заполните способности.<br/>');
  $errors = TRUE;
}
if (empty($_POST['sex'])) {
  print('Заполните пол.<br/>');
  $errors = TRUE;
}
if (empty($_POST['arms'])) {
  print('Заполните пол.<br/>');
  $errors = TRUE;
}
// *************
// Тут необходимо проверить правильность заполнения всех остальных полей.
// *************

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}

// Сохранение в базу данных.

$user = 'u52995'; // Заменить на ваш логин uXXXXX
$pass = '1306430'; // Заменить на пароль, такой же, как от SSH
$db = new PDO(
  'mysql:host=localhost;dbname=u52995',
  $user,
  $pass,
  [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
); // Заменить test на имя БД, совпадает с логином uXXXXX

// Подготовленный запрос. Не именованные метки.
try {
  $stmt = $db->prepare("INSERT INTO application SET name = ? , email = ?, year = ?, sex = ?, arms = ?, biografy = ?");
  $stmt->execute([$_POST['fio'], $_POST['email'], $_POST['year'], $_POST['sex'], $_POST['arms'], $_POST['biografy']]);
  $application_id = $db->lastInsertId();
  $application_ability = $db->prepare("INSERT INTO application_ability SET  application_id = ?, ability_id = ?");
  foreach($_POST["ability"] as $ability){   
    $application_ability->execute([$application_id, $ability]);
    print($ability);
  }

} catch (PDOException $e) {
  print('Error : ' . $e->getMessage());
  exit();
}

//  stmt - это "дескриптор состояния".

//  Именованные метки.
//$stmt = $db->prepare("INSERT INTO test (label,color) VALUES (:label,:color)");
//$stmt -> execute(['label'=>'perfect', 'color'=>'green']);

//Еще вариант
/*$stmt = $db->prepare("INSERT INTO users (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$firstname = "John";
$lastname = "Smith";
$email = "john@test.com";
$stmt->execute();
*/

// Делаем перенаправление.
// Если запись не сохраняется, но ошибок не видно, то можно закомментировать эту строку чтобы увидеть ошибку.
// Если ошибок при этом не видно, то необходимо настроить параметр display_errors для PHP.
header('Location: ?save=1');
