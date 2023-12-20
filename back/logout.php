<?php
    session_start();
    header('Location: login_entrada.php');
    session_destroy();
?>