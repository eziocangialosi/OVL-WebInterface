<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>
<body>
    <?php 
    include('template/header.php');
    include("template/connect.php"); 

    switch($_GET['connexion']){
        case 1:
            ?>
            <div class="alert alert-danger mt-4 mb-4 alert_test alert-dismissible" role="alert">
            Wrong Password !
            <a href="#" class="close" data-dismiss="alert" style="margin-left: 20px; margin-right: 20px"aria-label="close"><i class="fa-solid fa-xmark"></i></a>
            </div>
        </div>
            <?php
            break;
        case 2:
            ?>

            <div class="alert alert-danger mt-4 mb-4 alert_test alert-dismissible" role="alert">
            Wrong Email !
            <a href="#" class="close" data-dismiss="alert" style="margin-left: 20px; margin-right: 20px"aria-label="close"><i class="fa-solid fa-xmark"></i></a>
            </div>
        </div>
            <?php
            break;
        case 3:
            ?>
            <div class="alert alert-success mt-4 mb-4 alert_test alert-dismissible" role="alert">
            Successfully disconnect !
            <a href="#" class="close" data-dismiss="alert" style="margin-left: 20px; margin-right: 20px"aria-label="close"><i class="fa-solid fa-xmark"></i></a>
            </div>
            <?php
            break;
    }
    include('template/footer.php');
    ?> 
        <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>
