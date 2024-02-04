<?php

    session_start();
    if (array_key_exists('name_of_user', $_SESSION)) {
        header("Location: /load.php");
    }
    else {
        header("Location: /");
    }

?>