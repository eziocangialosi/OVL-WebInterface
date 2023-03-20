<?php
session_start();
unset($_SESSION['user']);
header('Location: https://ovl.tech-user.fr:7070/connect.php?connexion=3');
?>