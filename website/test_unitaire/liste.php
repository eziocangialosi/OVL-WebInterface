<?php
// include functions.php file
require_once('tests_unit.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include style.css file for general styling -->
    <link href="https://ovl.tech-user.fr:7070/css/style.css" rel="stylesheet">
    <!-- Import bootstrap css from cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Import bootstrap bundle min js from cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <!-- Set title of the page -->
    <title>Test unitaires</title>
    <!-- Import mdb.min.css file -->
    <link rel="stylesheet" href="https://ovl.tech-user.fr:7070/css/mdb.min.css" />
</head>

<body>
    <!-- Include header.php in the body -->
    <?php
    include('../template/header.php');
    ?>
    <div class="row m-3">
        <div class="col-sm-4">
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">Liste IOT</h5>
                    <p class="card-text">Obtenir la liste des trackers pour l'utilisateur à partir de son jeton.</p>
                    <a href="#history"><button type="button" class="btn btn-primary">Voir</button></a>
                    <button type="button" class="btn btn-primary">Télécharger</button>
                </div>
            </div>
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text">Obtenir un jeton api à partir d'un mail et d'un mot de passe.</p>
                    <a href="#verify_users"><button type="button" class="btn btn-primary">Voir</button></a>
                    <button type="button" class="btn btn-primary">Télécharger</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">Liste Position</h5>
                    <p class="card-text">Obtenir l'historique de toutes les positions d'un tracker en fonction de son identifiant.<br>
                </p>
                    <a href="#getPos"><button type="button" class="btn btn-primary">Voir</button></a>
                    <button type="button" class="btn btn-primary">Télécharger</button>
                </div>
            </div>
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">Position Now</h5>
                    <p class="card-text">Obtenir la position actuelle du tracker en fonction de son identifiant.</p>
                    <a href="#getPosNow"><button type="button" class="btn btn-primary">Voir</button></a>
                    <button type="button" class="btn btn-primary">Télécharger</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card m-3">
                <div class="card-body">
                    <h5 class="card-title">Liste Status</h5>
                    <p class="card-text">Obtenir la liste d'état de tous les trackers de l'utilisateur à partir de son jeton.</p>
                    <a href="#stat_list"><button type="button" class="btn btn-primary">Voir</button></a>
                    <button type="button" class="btn btn-primary">Télécharger</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        getIOT();
        getStatus();
        getPos();
        getUser();
        getPosNow();
    ?>
    <!-- Include footer.php in the body -->
    <?php
        include('../template/footer.php');
    ?>
</body>

</html>