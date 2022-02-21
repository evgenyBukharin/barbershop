<?php

    session_start();
    session_unset();
    session_destroy();
    echo "Вы вышли из аккаунта";

?>