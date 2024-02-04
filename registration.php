<?php
    $config = include __DIR__.'/config.php';

    header('Content-Type: application/json'); //сообщаем браузеру, что ответ будет в формате JSON

    // $a = 5;
    // $b = 'abc';
    // echo json_encode(['a' => $a]);
    // echo json_encode(['b' => $b]);

    if (isset($_GET['name']) && isset($_GET['login']) && isset($_GET['phone']) && isset($_GET['password']) 
    && isset($_GET['second_password']) && isset($_GET['agreement'])){

        // Переменные с формы
        $name = htmlspecialchars($_GET['name']);
        $login = htmlspecialchars($_GET['login']);
        $phone = htmlspecialchars($_GET['phone']);
        $password = htmlspecialchars($_GET['password']);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $options = [];

        $dsn = "pgsql:host=".$config['db_host'].";port=".$config['db_port'].";dbname=".$config['db_base']."";
        $db = new PDO($dsn,$config['db_user'],$config['db_password'], $options);

        // $query_check = $db->prepare("SELECT * FROM users WHERE login_of_user = :login");
        // $query_check->execute('login' => $login);

        // if ($query_check != null) {

        // }

        //проверка, что пользователя с таким логином еще нет
        $sql_check = "SELECT * FROM users WHERE login_of_user = :login";
        $result = $db->prepare($sql_check);
        $result->bindParam(":login", $login, PDO::PARAM_STR);
        $result->execute();

        $error = '';

        if ($result->rowCount()) {
            $error = 'Такой пользователь уже зарегистрирован';
        }

        if (mb_strlen($error) != 0) {
            echo json_encode(['error' => $error]);
        }
    
        else {
            //добавляем его в таблицу
            
            // Собираем данные для запроса
            $data = array('name' => $name, 'login' => $login, 'phone' => $phone, 'hash' => $hash); 
            //Подготавливаем SQL-запрос (псевдопеременные при выполнении запроса заменятся реальными)
            $query = $db->prepare("INSERT INTO users values (DEFAULT, :name, :login, :phone, :hash)");
            //Выполняем запрос с данными (псевдопеременные заменяются на переменные из массива)
            $result = $query->execute($data);  

            //добавляем его в сессию
            session_start();
            $_SESSION['name_of_user'] = $data['name'];

            //возвращаемся на страницу
            // header("Location: {$_SERVER['HTTP_REFERER']}");
            // header("Location: /"); 

            // echo "Здравствуйте, " . $_SESSION['name_of_user'];
            // if (array_key_exists('name_of_user', $_SESSION)) {
            //     echo "yes";
            // }
            
            //отправляем ответ
            echo json_encode(['success' => true]);
        }
    }
?>