<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Детальная страница</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_detail.css">

    <link rel="icon" href="#" />
</head>

<?php 

    $config = include __DIR__.'/config.php';

    $options = [];

    $dsn = "pgsql:host=".$config['db_host'].";port=".$config['db_port'].";dbname=".$config['db_base']."";
    $db = new PDO($dsn, $config['db_user'], $config['db_password'], $options);

    $id_of_image = $_GET['id_of_image'];

    $sql = "SELECT images.name_of_image, images.date_of_image, images.image, users.name_of_user 
        FROM images JOIN users ON images.id_of_user = users.id_of_user
        WHERE images.id_of_image = $id_of_image";
    $result = $db->query($sql);

    $row = $result->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <div class="container">
        <? include_once 'header.php'; ?> 
    </div>

    <div class="container">
        <div class="upper_line"></div>
    </div>

    <div class="container">
        <div class="main_page">
            <div class="image">
                <!-- <img src = "img\img1.svg" alt="img1"> -->
                <img src = <?php echo $row['image']; ?> alt="img">
            </div>

            <div class="lines">
                <div class="line1">
                    <div class="image_name">
                        <!-- July. Summer butterflies. -->
                        <?php echo $row['name_of_image']; ?>
                    </div>
                    <button class="back">
                        <!-- <img src = "img\back.svg" alt="back"> -->
                        <a href = "/">< Назад</a>
                    </button>
                </div>

                <div class="line2">
                    <div class="date">
                        <!-- Добавлено 11 августа. -->
                        <?php echo $row['date_of_image']; ?>
                    </div>
                    <div class="user">
                        <!-- Константин Константинопольский. -->
                        <?php //echo $user_row['name_of_user']; ?>
                        <?php echo $row['name_of_user']; ?>
                    </div>
                </div>

                <div class="line3">
                    <div class="rating">
                        <!-- <div class="texts">
                            <div class="rating_text">Рейтинг</div>
                            <div class="number_of_estimates">138 оценок</div>
                        </div> -->
                        <div class="rating_text">Рейтинг</div>
                        <div class="rating_value">4.8</div>
                        <div class="number_of_estimates">138 оценок</div>
                    </div>
                    <div class="estimate">
                        <div class="estimate_text">Оцените&nbspфотографию</div>
                        <div class="estimate_value">
                            <a class="star1" href="#star1"><img src = "img\star.svg" alt="star1"></a>
                            <a class="star2" href="#star1"><img src = "img\star.svg" alt="star2"></a>
                            <a class="star3" href="#star1"><img src = "img\star.svg" alt="star3"></a>
                            <a class="star4" href="#star1"><img src = "img\star.svg" alt="star4"></a>
                            <a class="star5" href="#star1"><img src = "img\star.svg" alt="star5"></a>
                        </div>
                        <button class="estimate_button">
                            <a href = "#estimate">Оценить</a>
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="lower_line"></div>
    </div>
    
    <div class="container">
        <? include_once 'footer.php'; ?> 
    </div>

    <!-- Добавлены модальные окна -->

    <!-- <form action="autorization.php" method="POST"> -->
    <form class="auto_form" name="auto_form">
        <div class="autorization_wrap" id="autorization_href" aria-hidden="true">
            <div class="autorization_window" role = "dialog" aria-modal="true">

                <div class="close">
                    <a href="#close">
                        <img src = "img\close.svg" alt = "close">
                    </a>
                </div>

                <div class="start_autorization_registration">
                    <div class="start_registration">
                        <a href="#registration_href">Регистрация</a>
                    </div>
                    <div class="start_autorization">
                        <a href="#autorization_href">Авторизация</a>
                    </div>
                </div>

                <div class="login_password">
                    <div class="autorization_login">
                        <input type="email" placeholder="Email" name="login" />
                    </div>
            
                    <div class="autorization_password">
                        <input type="password" placeholder="Пароль" name="password" />
                    </div>
                </div>
                <!-- <input class="autorization_close" type ="submit" name = "autorization" value="Войти" /> -->
                <!-- <button data-hystclose class="autorization_close">
                    Войти
                </button> -->
                <button class="autorization_close" type ="submit" name = "autorization">Войти</button>

                <div class="warning">
                    <img src = "img\info.svg" alt = "info">
                    Все поля обязательны для заполнения
                </div>
            </div>
        </div>
    </form>

    <!-- <form action="registration.php" method="POST"> -->
    <form class="reg_form" name="reg_form">    
        <div class="registration_wrap" id="registration_href" aria-hidden="true">
            <div class="registration_window" role = "dialog" aria-modal="true">

                <div class="close">
                    <a href="#close">
                        <img src = "img\close.svg" alt = "close">
                    </a>
                </div>

                <div class="start_autorization_registration">
                    <div class="start_registration">
                        <a href="#registration_href">Регистрация</a>
                    </div>
                    <div class="start_autorization">
                        <a href="#autorization_href">Авторизация</a>
                    </div>
                </div>

                <!-- <div class="fields">
                    
                </div> -->

                <div class="name">
                    <input type="text" placeholder="Ваше имя" name="name" />
                </div>
                
                <div class="first_string">
                    <div class="registration_login">
                        <input type="email" placeholder="Email" name="login" />
                    </div>

                    <div class="phone">
                        <input type="number" placeholder="Мобильный телефон" name="phone" />
                    </div>
                </div>
        
                <div class="second_string">
                    <div class="registration_password">
                        <input type="password" placeholder="Пароль" name="password" />
                    </div>

                    <div class="second_password">
                        <input type="password" placeholder="Повторите пароль" name="second_password" />
                    </div>
                </div>

                <div class="agreement">
                    <input type="checkbox" name = "agreement" />
                    Согласен на обработку персональных данных
                </div>

                <!-- <button data-hystclose class="registration_close">
                    Зарегистрироваться
                </button> -->
                <!-- <input class="registration_close" type ="submit" name = "registration" value="Зарегистрироваться" /> -->
                <button class="registration_close" type ="submit">Зарегистрироваться</button>
                
                <div class="registration_warning">
                    <img src = "img\info.svg" alt = "reg_info">
                    Все поля обязательны для заполнения
                </div>
            </div>
        </div>
    </form>

    <script src="app_detail.js"></script>
</body>
</html>