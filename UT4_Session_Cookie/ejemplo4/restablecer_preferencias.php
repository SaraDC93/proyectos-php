<?php

    setcookie("color", "", time()-(365 * 24 * 60 * 60), "/");

    header("Location: preferencia.php");
    exit();

?>