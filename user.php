<?php
    $config = include __DIR__.'/config.php';

    if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['phone']) && isset($_POST['password']) 
    && isset($_POST['second_password']) && isset($_POST['agreement'])){
        // Переменные с формы
        $name = $_POST['name'];
        $login = $_POST['login'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        // $second_password = $_POST['second_password'];
        // $agreement = $_POST['agreement'];
        
        // // Параметры для подключения
        // $db_host = "localhost"; 
        // $db_port = 5432;
        // $db_user = "postgres"; // Логин БД
        // $db_password = "sdf"; // Пароль БД
        // $db_base = 'photogallery'; // Имя БД
        // $db_table = "users"; // Имя Таблицы БД

        $options = [];

        // $link = mysqli_connect($host, $user, $password, $database) 
        //     or die("Ошибка " . mysqli_error($link));
        
        try {
            // /** @var string формируем dsn для подключения */
            $dsn = "pgsql:host=".$config['db_host'].";port=".$config['db_port'].";dbname=".$config['db_base']."";
            // /** @var PDO подключение к базе данных */
            $db = new PDO($dsn,$config['db_user'],$config['db_password'], $options);

            // $sql = "INSERT INTO $db_table VALUES (DEFAULT, '$name', '$login', '$phone', '$password')";
            // // $sql = "INSERT INTO users VALUES (DEFAULT, 'test', 'test', '89046537252', 'test')";
            // $res = $db->exec($sql);

            // foreach($db->query('SELECT * from users') as $row) {
            //     print_r($row);
            // }
            // $dbh = null;

            // // Подключение к базе данных
            // $db = new PDO_PGSQL("pgsql:host=$db_host;port=$db_port;dbname=$db_base;user=$db_user;password=$db_password");
            // Собираем данные для запроса
            $data = array('name' => $name, 'login' => $login, 'phone' => $phone, 'password' => $password); 
            //Подготавливаем SQL-запрос (псевдопеременные при выполнении запроса заменятся реальными)
            $query = $db->prepare("INSERT INTO users values (DEFAULT, :name, :login, :phone, :password)");
            //Выполняем запрос с данными (псевдопеременные заменяются на переменные из массива)
            $query->execute($data);
            // Запишим в переменую, что запрос отработал
            // $result = true;
            header('Location: /');
        } catch (PDOException $e) {
            // Если есть ошибка соединения или выполнения запроса, выводим её
            print "Ошибка!: " . $e->getMessage() . "<br/>";
        }
        
        // if ($result) {
        //     echo "Успех. Информация занесена в базу данных";
        // }
    }
?>