<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include style.css file for general styling -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Import bootstrap css from cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Import bootstrap bundle min js from cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <!-- Set title of the page -->
    <title>Home</title>
    <!-- Import mdb.min.css file -->
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
    <!-- Include header.php in the body -->
    <?php
    include('template/header.php');
    ?>
    <!-- Add a break line before h1 -->
    <br>

    <!-- Center align h1 with Accueil text -->
    <h1 style="text-align: center">Accueil</h1>

    <!-- Include footer.php in the body -->
    <?php
    include('template/footer.php');
    ?>
</body>

</html>