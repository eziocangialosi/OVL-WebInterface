<?php
$iot = $_GET["iot"];
$pos = $_GET["pos"];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <title>Historique</title>
    <link rel="stylesheet" src="https://ovl.tech-user.fr:7070/css/mdb.min.css">
</head>

<body>
    <?php
    include('../template/header.php');
    require_once('../functions.php');
    $history = file_get_contents("https://ovl.tech-user.fr:6969/position/history/" . $iot . "/");
    $parsed_history = json_decode($history);
    ?>
    <br>
    <?php if (isset($_SESSION['user'])) { ?>
        <h1 style="text-align: center">Historique</h1>
        <?php if ($parsed_history->{'error'}->{'Code'} == 0) { ?>
            <div class="row mb-5 history">
                <div class="col mt-5">
                    <div class="img-fluid">
                        <div id="map" style="min-height: 700px"></div>
                    </div>
                </div>
                <div class="col mt-5">
                    <?php printPos($history, $parsed_history); ?>
                </div>
            </div>
            <?php
        }
        include('../template/param.php');
        include('../template/map.php');
    } else {
        echo $parsed_history->{'error'}->{'Message'};
    }
    include('../template/footer.php');
    ?>



</body>

</html>