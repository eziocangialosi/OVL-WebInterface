<?php
session_start();
include 'initLink.php';

//start a session and check if email and password are set in POST request
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $mdp = $_POST['password'];

    //Get user data from the API using email and password
    $users_verif = file_get_contents($API_link ."/user/" . $email . "/" . $mdp);
    $parsed_users_verif = json_decode($users_verif);
    //print_r raw response data
    echo $users_verif;
    if($users_verif != "")
    {
        //Check the response status code and handle accordingly
        if ($parsed_users_verif->{'error'}->{'Code'} == "0") {
            unset($_SESSION["Connexion"]);
            $_SESSION["user"]["time"] = time();
            $_SESSION["user"]["token"] = $parsed_users_verif->{'user'};
            //Redirect to iotList.php with "connexion=0" flag
            header('Location: https://ovl.tech-user.fr:7070/iotList.php?connexion=0');
        } elseif ($parsed_users_verif->{'error'}->{'Code'} == "30") {
            unset($_SESSION["user"]);
            //Redirect to connect.php with "connexion=1" flag
            header('Location: https://ovl.tech-user.fr:7070/connect.php?connexion=1');
        } elseif ($parsed_users_verif->{'error'}->{'Code'} == "32") {
            unset($_SESSION["user"]);
            //Redirect to connect.php with "connexion=2" flag
            header('Location: https://ovl.tech-user.fr:7070/connect.php?connexion=2');
        }
    }else{
        header('Location: https://ovl.tech-user.fr:7070/connect.php?connexion=4');
    }
}
