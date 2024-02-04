<!DOCTYPE html>
<? session_start(); 
if (array_key_exists('name_of_user', $_SESSION)) { ?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница загрузки</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_load.css">

    <link rel="icon" href="#" />
</head>

<body>
    <div class="container">
        <? include_once 'header.php'; ?> 
    </div>

    <div class="container">
        <div class="upper_line"></div>
    </div>

    <?php

    $errors = [];

    if (!empty($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }

    ?>

    <div class="container">
        <form name="loading" action="load_handler.php" method="POST" enctype="multipart/form-data">
            <div class="main_page">
                <div class="image_field">
                <!-- <input class="image_field" type="file" placeholder=""/> -->
                    <!-- <a href class="plus"><img src = "img\+.svg" alt="plus"></a> -->
                    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
                    <input class="plus" type="file" id="input__file" name="plus" required />
                    <label for="input__file">
                        <span class="plus_image" onclick="click_plus()"><img src="img\+.svg" alt="+"></span>
                        <!-- <span class="input__file-button-text">1</span> -->
                    </label>
                    <!-- <div class="plus"><img src = "img\+.svg" alt="plus"></div> -->
                    <div class="requirement1">Загрузите фотографию</div>
                    <div class="requirement2">(допустимый формат - jpg, максимальный размер - 3 Мб)</div>
                    <!-- <img class="image" src=<?=$_SESSION['image']?> alt="image"> -->
                </div>

                <div class="lines">
                    <div class="line1">
                        <input class="image_name" onclick="click_desc()" placeholder="Описание" name="image_name" required/>
                    </div>

                    <div class="line3">
                        <? 
                        if (array_key_exists('size', $errors)) {
                            echo $errors['size'];
                        }
                        if (array_key_exists('format', $errors)) {
                            echo $errors['format'];
                        }
                        if (array_key_exists('move', $errors)) {
                            echo $errors['move'];
                        }
                        ?>
                    </div>

                    <div class="line2">
                        <button class="load_image" type ="submit" name = "load_image">
                            Опубликовать фотографию
                        </button>

                        <div class="warning">
                            <img src = "img\info.svg" alt = "info">
                            Все поля обязательны для заполнения
                        </div>
                    </div>
                </div>
            </div>
        </form>    
    </div>

    <div class="container">
        <div class="lower_line"></div>
    </div>
    
    <div class="container">
        <? include_once 'footer.php'; ?> 
    </div>

    <script src="app_load.js"></script>

</body>    
</html>

<? } 
else {
    echo 'Страница доступна только авторизованным пользователям';
}?>