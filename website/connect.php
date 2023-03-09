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
            <div class="alert alert-danger p-auto mt-4" role="alert">
                Mot de Passe incorrect !
            </div>
            <?php
            break;
        case 2:
            ?>
            <div class="alert alert-danger p-auto mt-4" role="alert">
                Email incorrect !
            </div>
            <?php
            break;
        case 3:
            ?>
            <div class="alert alert-success p-auto mt-4" role="alert">
                Déconnecter avec succès !
            </div>
            <?php
            break;
    }
    include('template/footer.php');
    ?> 
        <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>
