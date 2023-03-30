<?php
session_start();
// Include initLink
include 'php/initLink.php';
?>

<?php
// Define maximum inactivity time in seconds
$inactivityTime = 1800; // 30 minutes

if (isset($_SESSION['user'])) {
    // Record the current time
    $_SESSION['user']['time'] = time();
?>
    <script>
    // Detect user inactivity
    function checkActivity() {
        var now = new Date().getTime();
        var difference = now - <?php echo $_SESSION['user']['time']; ?>;
        if (difference > <?php echo $inactivityTime; ?> * 1000) {
            // Redirect the user to the logout page
            $redirect_link = $Website_link + "/php/disconnect.php";
            window.location.href = $redirect_link;
        }
    }
    // Check user activity every 60 seconds
    setInterval(checkActivity, 600 * 1000);
    </script>
<?php
} else if (!isset($_SESSION['user']) and ($_SERVER['REQUEST_URI'] != "/index.php" and $_SERVER['REQUEST_URI'] != "/" and !str_contains($_SERVER['REQUEST_URI'],'/connect.php'))) {
    echo $_SERVER['REQUEST_URI'];
    header('Location: https://ovl.tech-user.fr:7070/');
}
?>



<link rel="stylesheet" href=<?php echo $Website_link ."/css/mdb.min.css"; ?>/>
<link rel="stylesheet" href= <?php echo $Website_link ."/css/style.css"; ?> />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
<link href="<?php echo $Website_link ."css/style.css" ?>" rel="stylesheet">


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar_modify" >
  <!-- Container wrapper -->
  <div class="container-fluid">
  <?php if (!isset($_SESSION['user'])) { ?>
    <!-- Navbar brand -->
    <a class="navbar-brand" href=<?php echo $Website_link ."/index.php" ?>>
    <img
        src=<?php echo $Website_link ."/img/OVL_Logo.png" ?>
        class="me-2"
        height="40"
        loading="lazy"
      />  
    Home</a>
    <?php }else{
      ?>
        <a class="navbar-brand" href=<?php echo $Website_link ."/iotList.php"; ?>>
        <img
            src=<?php echo $Website_link ."/img/OVL_Logo.png" ?>
            class="me-2"
            height="40"
            loading="lazy"
          />  
        Trackers</a>
      <?php
    } ?>

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
          <a class="nav-link" href=<?php echo $Website_link ."/test_unitaire/liste.php"; ?>>Unit tests</a>
        </li>
        <?php } ?>
      </ul>

      <!-- Icons -->
      <ul class="navbar-nav d-flex flex-row me-1">
      <?php if (!isset($_SESSION['user'])) { ?>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href=<?php echo $Website_link ."/connect.php"; ?> data-mdb-toggle="tooltip" data-mdb-placement="left" title="Connect"><i class="fa-solid fa-user"></i> Connect</a>
        </li>
        <?php } ?>
        <?php if (isset($_SESSION['user'])) { ?>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href=<?php echo $Website_link ."/php/disconnect.php"; ?> data-mdb-toggle="tooltip" data-mdb-placement="left" title="Disconnect"><i class="fa-solid fa-user-slash"></i> Disconnect</a>
        </li>
        <?php } ?>
      </ul>

    </div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

