<?php
session_start();

?> 

<?php
// Définir le temps d'inactivité maximum en secondes
$inactivityTime = 1800; // 30 minutes

if (isset($_SESSION['user'])) {
    // Enregistrer le temps actuel
    $_SESSION['user']['time'] = time();
    ?>
    <script>
    // Détecter l'inactivité de l'utilisateur
    function checkActivity() {
        var now = new Date().getTime();
        var difference = now - <?php echo $_SESSION['user']['time']; ?>;
        if (difference > <?php echo $inactivityTime; ?> * 1000) {
            // Rediriger l'utilisateur vers la page de déconnexion
            window.location.href = "https://ovl.tech-user.fr:7070/php/disconnect.php";
        }
    }
    // Vérifier l'activité de l'utilisateur toutes les 60 secondes
    setInterval(checkActivity, 600 * 1000);
    </script>
    <?php
}else if(!isset($_SESSION['user']) and ($_SERVER['REQUEST_URI'] != "/index.php" and $_SERVER['REQUEST_URI'] != "/" and $_SERVER['REQUEST_URI'] != "/connect.php" and $_SERVER['REQUEST_URI'] != "/connect.php?connexion=3" and $_SERVER['REQUEST_URI'] != "/connect.php?connexion=1" and $_SERVER['REQUEST_URI'] != "/connect.php?connexion=2")){
  echo $_SERVER['REQUEST_URI'];
  header('Location: https://ovl.tech-user.fr:7070/');
}
?>


<link rel="stylesheet" href="https://ovl.tech-user.fr:7070/css/mdb.min.css" />
<link rel="stylesheet" href="https://ovl.tech-user.fr:7070/css/style.css" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#392840;">
  <!-- Container wrapper -->
  <div class="container-fluid">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="https://ovl.tech-user.fr:7070/index.php">
    <img
        src="https://ovl.tech-user.fr:7070/img/OVL_Logo.png"
        class="me-2"
        height="40"
        loading="lazy"
      />  
    Home</a>

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

   
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if (isset($_SESSION['user'])) { ?>
        <!-- Link -->
        <li class="nav-item">
          <a class="nav-link" href="https://ovl.tech-user.fr:7070/test_unitaire/liste.php">Unit tests</a>
        </li>
        <!-- Link -->
        <li class="nav-item">
          <a class="nav-link" href="https://ovl.tech-user.fr:7070/iotList.php">Trackers</a>
        </li>
        <?php } ?>
      </ul>

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1">
      <?php if (!isset($_SESSION['user'])) { ?>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="https://ovl.tech-user.fr:7070/connect.php" data-mdb-toggle="tooltip" data-mdb-placement="left" title="Connect"><i class="fa-solid fa-user"></i> Connect</a>
        </li>
        <?php } ?>
        <?php if (isset($_SESSION['user'])) { ?>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="https://ovl.tech-user.fr:7070/php/disconnect.php" data-mdb-toggle="tooltip" data-mdb-placement="left" title="Disconnect"><i class="fa-solid fa-user-slash"></i> Disconnect</a>
        </li>
        <?php } ?>
      </ul>

    </div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

