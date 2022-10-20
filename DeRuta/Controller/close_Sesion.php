<?php

    session_start();

    unset($_SESSION['user']);
    header('Location: ../Controller/index.php');
    die;

 ?>