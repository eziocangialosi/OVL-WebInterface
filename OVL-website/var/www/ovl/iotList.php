<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mdb.min.css" />
    
    <title>Trackers</title>
</head>
<body>
    <?php
        // Include header template
        include('template/header.php');
    ?>
    <?php if (isset($_SESSION['user'])) { ?>
        <br>
        <h1 style="text-align: center">Trackers List</h1>
        <?php
            // Include IoTArray template
            include('template/IotArray.php');

            // Display success message if 'connexion' is set
            if (isset($_GET['connexion'])) {
        ?>
                <div class="alert alert-success mt-4 mb-4 alert_test alert-dismissible" role="alert">
                    Login Successfully !
                    <a href="#" class="close" data-dismiss="alert" style="margin-left: 20px; margin-right: 20px" aria-label="close"><i class="fa-solid fa-xmark"></i></a>
                </div>
        <?php 
            } 
        ?>
    <?php
        }
        // Include footer template
        include('template/footer.php');
    ?>
</body>
</html>
