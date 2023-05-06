<!DOCTYPE html>
<html lang="en">
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

    // Define messages and their corresponding CSS classes
    $messages = [
        1 => ['message' => 'Wrong Password !', 'class' => 'alert-danger'],
        2 => ['message' => 'Wrong Email !', 'class' => 'alert-danger'],
        3 => ['message' => 'Successfully disconnect !', 'class' => 'alert-success'],
        4 => ['message' => 'API Connection Lost !', 'class' => 'alert-danger'],
    ];

    // Display the message if it exists
    if (isset($_GET['connexion']) && isset($messages[$_GET['connexion']])) {
        $message = $messages[$_GET['connexion']];
    ?>
        <div class="alert <?php echo $message['class']; ?> mt-4 mb-4 alert_test alert-dismissible" role="alert">
            <?php echo $message['message']; ?>
            <a href="#" class="close" data-dismiss="alert" style="margin-left: 20px; margin-right: 20px" aria-label="close"><i class="fa-solid fa-xmark"></i></a>
        </div>
    <?php
    }
    include('template/footer.php');
    ?> 
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>
