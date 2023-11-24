<?php

session_start();

if (!isset($_SESSION['perfil'])){
    header('Location: login.php');
}

unset($_SESSION);
session_destroy();

header('Location: index.php');
