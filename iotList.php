<?php
    require_once('functions.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mdb.min.css" />
    <title>Traqueurs</title>
</head>
<body>

    <?php
        include('template/header.php');
    ?>
    <?php if (isset($_SESSION['user'])) { ?>
    <br>
    <h1 style="text-align: center">Liste des Traqueurs</h1>
    <?php
        printIOT();

        if(isset($_GET['connexion']))
        {
        ?>
        <div class="alert alert-success mt-4 mb-4" role="alert">
            Connexion réussie !
        </div>
        <?php } ?>
        <?php
        }
        include('template/footer.php');
    ?>
</body>
</html>

