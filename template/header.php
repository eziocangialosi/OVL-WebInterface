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
}
?>


<link rel="stylesheet" href="https://ovl.tech-user.fr:7070/css/mdb.min.css" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#392840;">
  <!-- Container wrapper -->
  <div class="container-fluid">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="https://ovl.tech-user.fr:7070/index.php">Accueil</a>

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
          <a class="nav-link" href="https://ovl.tech-user.fr:7070/test_unitaire/liste.php">Tests unitaires</a>
        </li>
        <!-- Link -->
        <li class="nav-item">
          <a class="nav-link" href="https://ovl.tech-user.fr:7070/iotList.php">Traqueurs</a>
        </li>
        <?php } ?>
      </ul>

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1">
      <?php if (!isset($_SESSION['user'])) { ?>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="https://ovl.tech-user.fr:7070/connect.php" data-mdb-toggle="tooltip" data-mdb-placement="left" title="Connexion"><i class="fa-solid fa-user"></i> Connexion</a>
        </li>
        <?php } ?>
        <?php if (isset($_SESSION['user'])) { ?>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="https://ovl.tech-user.fr:7070/php/disconnect.php" data-mdb-toggle="tooltip" data-mdb-placement="left" title="Déconnexion"><i class="fa-solid fa-user-slash"></i> Déconnexion</a>
        </li>
        <?php } ?>
      </ul>

    </div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
