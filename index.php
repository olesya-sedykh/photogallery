<!DOCTYPE html>
<? session_start(); ?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фотогалерея</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="#" />
</head>
<body>
    <div class="container">
        <? include_once 'header.php'; ?> 
    </div>

    <div class="container">
        <div class="upper_line"></div>
    </div>

    <div class="container">
        <div class="introduction">
            <div class="month">Июль,&nbsp2022</div>
            <button class="add">
                <a href="\add.php">+&nbspДобавить&nbspфото</a>
            </button>
        </div>
    </div>

    <?php 
        // Параметры для подключения
        $db_host = "localhost"; 
        $db_port = 5432;
        $db_user = "postgres"; // Логин БД
        $db_password = "sdf"; // Пароль БД
        $db_base = 'photogallery'; // Имя БД
        $db_table = "images"; // Имя Таблицы БД

        $options = [];

        $dsn = "pgsql:host=".$db_host.";port=".$db_port.";dbname=".$db_base."";
        $db = new PDO($dsn, $db_user, $db_password, $options);

        $sql = "SELECT * FROM images";
        $result = $db->query($sql);

        // $row = $result->fetch(PDO::FETCH_ASSOC);
        // while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        //     print_r($row['image']);
        // }
    ?>

    <div class="container">
        <div class="main_page">
            <?php foreach ($result as $row): ?>
                <div class="image">
                    <? //print_r($row); ?>
                    <img src = <?php echo $row['image']; ?> alt="img">
                    <div class="image_date"><?php echo $row['date_of_image']; ?></div>
                    <?php $id_of_image = $row['id_of_image']; ?> 
                    <a href="/detail.php?id_of_image=<?=$id_of_image?>" class="image_name"><?php echo $row['name_of_image']; ?></a>
                </div>
            <?php endforeach; ?>
            <!-- <div class="image">
                <img src = "img\65847cf2e0ee8.jpg" alt="img1">
                <div class="date">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name">July.&nbspSummer&nbspbutterflies.</a>
            </div> -->
            <!-- <div class="img2">
                <img src = "img\img2.svg" alt = "img2">
                <div class="date2">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name2">Summer&nbspbutterflies.</a>
            </div>
            <div class="img3">
                <img src = "img\img3.svg" alt = "img3">
                <div class="date3">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name3">Cape&nbspPoint&nbsppeninsula&nbspSouth&nbspAfrica</a>
            </div>
            <div class="img4">
                <img src = "img\img4.svg" alt = "img4">
                <div class="date4">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name4">Antelope&nbspCanyon</a>
            </div>
            <div class="img5">
                <img src = "img\img5.svg" alt = "img5">
                <div class="date5">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name5">Waves&nbspcrashing&nbspin&nbspBrittany,&nbspFrance</a>
            </div>
            <div class="img6">
                <img src = "img\img6.svg" alt = "img6">
                <div class="date6">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name6">After&nbspthe&nbsprain</a>
            </div>
            <div class="img7">
                <img src = "img\img7.svg" alt = "img7">
                <div class="date7">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name7">Milkyway&nbsptrail&nbspover&nbspdeath&nbspvalley</a>
            </div>
            <div class="img8">
                <img src = "img\img8.svg" alt = "img8">
                <div class="date8">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name8">Nature</a>
            </div>
            <div class="img9">
                <img src = "img\img9.svg" alt = "img9">
                <div class="date9">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name9">July.&nbspSummer&nbspbutterflies.</a>
            </div>
            <div class="img10">
                <img src = "img\img10.svg" alt = "img10">
                <div class="date10">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name10">Wheat&nbspperiod.</a>
            </div>
            <div class="img11">
                <img src = "img\img11.svg" alt = "img11">
                <div class="date11">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name11">A&nbspbaby&nbspjumping&nbspspider&nbspon yellow petals</a>
            </div>
            <div class="img12">
                <img src = "img\img12.svg" alt = "img12">
                <div class="date12">Добавлено&nbsp15&nbspавгуста</div>
                <a href class="name12">July.&nbspSummer&nbspbutterflies.</a>
            </div> -->
        </div>
    </div>

    <div class="container">
        <button class="continue">
            <a href = "#">Показать&nbspещё</a>
        </button>
    </div>

    <div class="container">
        <div class="lower_line"></div>
    </div>
    
    <div class="container">
        <? include_once 'footer.php'; ?> 
    </div>


    <!-- <form action="autorization.php" method="GET"> -->
    <!-- <form class="auto_form" name="auto_form" onsubmit="click_autorization()"> -->
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
                        <!-- <a href="#registration_href">Регистрация</a> -->
                        <a class="reg_href" href = "#registration_href" onclick="click_reg()">Регистрация</a>
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
                <!-- <button onclick="click_autorization()" class="autorization_close">Войти</button> -->

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
                        <!-- <a href="#registration_href">Регистрация</a> -->
                        <a class="reg_href" href = "#registration_href" onclick="click_reg()">Регистрация</a>
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
                <button class="registration_close" type ="submit" name = "registration">Зарегистрироваться</button>
                <!-- <button onclick="click_registration()" class="registration_close">Зарегистрироваться</button> -->
                
                <div class="registration_warning">
                    <img src = "img\info.svg" alt = "reg_info">
                    Все поля обязательны для заполнения
                </div>
            </div>
        </div>
    </form>

    <!-- <script>
        let autorization_login = document.querySelector('.autorization_login');
        let autorization_password = document.querySelector('.autorization_password');
        // console.log(autorization_password.ariaValueText);
        if ((autorization_login.ariaValueText != null) && (autorization_password.ariaValueText != null)) {
            console.log("Yes")
            let autorization_button = document.querySelector('.autorization_close');
            autorization_button.style.color = "white";
        }
    </script> -->

    <script src="app.js"></script>
</body>
</html>