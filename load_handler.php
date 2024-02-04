<?php

$config = include __DIR__.'/config.php';
// echo var_dump($_POST['plus']);
// var_dump($_FILES['plus']);
// echo $_FILES['userfile']['size'];

// echo $_FILES['plus']['type'];

$errors = [];

// $finfo = finfo_open(FILEINFO_MIME_TYPE);
// echo finfo_file($finfo, $path['filename']) . "\n";

// размер больше 3мб
if ($_FILES['plus']['size'] > 3145728) {
    $errors['size'] = 'Размер файла должен быть меньше 3 мб';
    header('Location: /load.php');
}

// $path = pathinfo($_FILES['plus']['name']);
// print_r($path);
// $ext = $path['extension'] ?? ""; //расширение
// echo $ext;
// $new_path = 'C:/OSPanel/domains/photogallery/img' . "/" . uniqid() . "." . $ext;
// echo $new_path;
// print_r($path);
// echo mime_content_type($path['dirname'] . '' . $path['filename']. '.' . $path['extension']);
// if (mime_content_type($new_path) != 'image/jpeg') {
//     $errors['format'] = 'Файлы можно загружать только в формате jpg';
// }

// $finfo = finfo_open(FILEINFO_MIME_TYPE);
// echo finfo_file($finfo, $path['filename']) . "\n";

//не тот формат
// if ($_FILES['plus']['type'] != 'image/jpeg') {
//     $errors['format'] = 'Файлы можно загружать только в формате jpg';
// }

//не тот формат
$path = pathinfo($_FILES['plus']['name']);
// echo mime_content_type($path['filename'] . '.' . $path['extension']);
// echo mime_content_type($_FILES['plus']['tmp_name']);
if (mime_content_type($_FILES['plus']['tmp_name']) != 'image/jpeg') {
    $errors['format'] = 'Файлы можно загружать только в формате jpg';
    header('Location: /load.php');
}

if (!empty($errors)) {
    session_start();
    $_SESSION['errors'] = $errors;
    // header('Location: /add.php');
    //    die();
}

else  {
    header('Location: /detail.php');

    $path = pathinfo($_FILES['plus']['name']);
    // print_r($path);
    $ext = $path['extension'] ?? ""; //расширение
    // echo $ext;
    $new_path = 'C:/OSPanel/domains/photogallery/img' . "/" . uniqid() . "." . $ext;
    // echo $new_path;
    // echo mime_content_type($new_path);
    // if (mime_content_type($new_path) != 'image/jpeg') {
    //     $errors['format'] = 'Файлы можно загружать только в формате jpg';
    // }

    // $finfo = finfo_open(FILEINFO_MIME_TYPE);
    // echo finfo_file($finfo, $path['filename']) . "\n";

    $tmp_name = $_FILES["plus"]["tmp_name"];
    // move_uploaded_file($tmp_name, $new_path);

    if (move_uploaded_file($tmp_name, $new_path)) {
        $date = date("d-m-y", filemtime($new_path));
        $name = $_POST['image_name'];
        // $image = 'http://photogallery/img' . substr($new_path, 37);
        // $image = 'img' . "/" . substr($new_path, 37);
        $image = 'http://photogallery/img' . "/" . substr($new_path, 36);
        // echo $image;
        $date = 'Добавлено ' . substr($date, 3, 2) . ' декабря';
        session_start();
        $user = $_SESSION['id_of_user'];

        $options = [];

        $dsn = "pgsql:host=".$config['db_host'].";port=".$config['db_port'].";dbname=".$config['db_base']."";
        $db = new PDO($dsn,$config['db_user'],$config['db_password'], $options);

        // Собираем данные для запроса
        $data = array('name' => $name, 'date' => $date, 'image' => $image, 'user' => $user); 
        //Подготавливаем SQL-запрос (псевдопеременные при выполнении запроса заменятся реальными)
        $query = $db->prepare("INSERT INTO images values (DEFAULT, :name, :date, :image, :user)");
        //Выполняем запрос с данными (псевдопеременные заменяются на переменные из массива)
        $result = $query->execute($data);

        session_start();
        $_SESSION['image'] = $image;

        //извлекаем самую новую запись
        $sql = "SELECT * FROM images ORDER BY id_of_image DESC LIMIT 1";
        $result_add = $db->query($sql);
        $row = $result_add->fetch(PDO::FETCH_ASSOC);
        $new_id = $row['id_of_image'];
        header('Location: /detail.php?id_of_image=' . $new_id);
    }
    else {
        $errors['move'] = 'Не удалось переместить файл';
        echo 'Не удалось переместить файл';
    }
}
    
?>