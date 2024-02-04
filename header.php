<? session_start(); ?>
<div class="header">
    <div class="logotip">
        <img src="img\logotip.svg" alt="Фотогалерея">
        <div class="logotip_text">Фотогалерея</div>
    </div>
    
    <div class="autorization">
        <? if (array_key_exists('name_of_user', $_SESSION)) { ?>
            <div class="hello"><? echo "Здравствуйте, " . $_SESSION['name_of_user']; ?></div>
            <a href = "/logout.php">Выход</a>
        <? }
        else { ?>
            <a class="reg_href" href = "#registration_href" onclick="click_reg()">Регистрация</a>
            <a class="auto_href" href = "#autorization_href" onclick="click_auto()">Вход</a>
        <? } ?>
    </div>
</div>