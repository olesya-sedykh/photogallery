<?php

header('Content-Type: application/json'); //сообщаем браузеру, что ответ будет в формате JSON

$config = include __DIR__.'/config.php';

// echo 1;

// $a = 5;
// $error = 'abc';
// var_dump($b);
// echo json_encode(['a' => $a]);
// echo json_encode(['error' => $error]);

if (isset($_GET['login']) && isset($_GET['password'])) {
    $login = htmlspecialchars($_GET['login']);
    $password = htmlspecialchars($_GET['password']);

    $options = [];

    try {
        $dsn = "pgsql:host=".$config['db_host'].";port=".$config['db_port'].";dbname=".$config['db_base'];
        $db = new PDO($dsn,$config['db_user'],$config['db_password'], $options);

        // $query = $db->prepare("SELECT * FROM users WHERE login_of_user = :login");
        // $result = $query->execute('login' => $login);

        $sql = "SELECT * FROM users WHERE login_of_user = :login";
        $result = $db->prepare($sql);
        $result->bindParam(":login", $login, PDO::PARAM_STR);
        $result->execute();

        // echo $result->rowCount();
    }
    catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        echo "Ошибка!: " . $e->getMessage() . "<br/>";
    }

    // $errors = [];
    $error = '';

    if (!$result->rowCount()) {
        // flash('Пользователь с такими данными не зарегистрирован');
        // header('Location: autorization.php');
        // $errors[] = 'Пользователь с такими данными не зарегистрирован';
        $error = 'Пользователь с такими данными не зарегистрирован';
        // header("Location: {$_SERVER['HTTP_REFERER']}");
        // die();
    }

    else {
        $user = $result->fetch(PDO::FETCH_ASSOC);
        // проверяем пароль
        if (!password_verify($password, $user['password_of_user'])) {
            // header('Location: autorization.php');
            // session_start();
            // $_SESSION['flash_message'] = 'Пароль неверен';
            // if(isset($_SESSION['flash_message'])) {
            //     $message = $_SESSION['flash_message'];
            //     unset($_SESSION['flash_message']);
            //     echo $message;
            // }
            // $errors[] = 'Неверный пароль';
            $error = 'Неверный пароль';
            // header("Location: {$_SERVER['HTTP_REFERER']}"); 
            // die();
        }
    }
    
    // echo json_encode(['error' => $error]);

    // if (!empty($errors)) {
    if (mb_strlen($error) != 0) {
        // echo json_encode(['errors' => $errors]);
        echo json_encode(['error' => $error]);
        // die();
    }

    else {
        // header('Location: index.php');
        session_start();
        $_SESSION['name_of_user'] = $user['name_of_user'];
        $_SESSION['id_of_user'] = $user['id_of_user'];
        // header("Location: {$_SERVER['HTTP_REFERER']}"); 
        // echo 'yes';
        echo json_encode(['success' => true]);
    }

    // echo json_encode(['success' => true]);
}

?>