<div class="container-fluid mb-5 container_status">
    <?php
    $status_list = file_get_contents("https://ovl.tech-user.fr:6969/status_list/" . $_SESSION["user"]["token"]);
    $parsed_status_list = json_decode($status_list);

    $tab = array(1 => "status_charge", 2 => "status_alarm", 3 => "status_ecomode", 4 => "status_protection", 5 => "status_vh_charge", 6 => "status_gps");
    ?>

</div>

<!-- Section: Design Block -->
<section class="text-center param pb-5 pt-5" id="param">
    <div class="row" style="margin-right: 0 !important;">
        <div class="col-sm-6">
            <div class="card mb-5 mt-5 mx-4 mx-md-auto shadow-5-strong" style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                max-width: 850px;
                ">
                <div class="card-body py-5 px-md-5">
                    <h2 class="fw-bold mb-5">Status</h2>
                    <div class="col" style="max-width: 500px; margin: auto;">
                        <h4>Charge Batterie</h4>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar" role="progressbar"
                                style="width: <?php echo $parsed_status_list->{'status_list'}[$iot - 1]->{"status_bat"}; ?>%;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $parsed_status_list->{'status_list'}[$iot - 1]->{"status_bat"}; ?>%
                            </div>
                        </div>
                    </div>
                    <div class="col mt-5" style="max-width: 500px; margin: auto;">
                        <h4>Status du Traqueur : </h4> <br>
                        <?php
                        if ($parsed_status_list->{'status_list'}[$iot - 1]->{'status_online'} == 1) {
                            ?>
                            <i class="fa-solid fa-check"></i> Online !
                        <?php
                        } else {
                            ?>
                            <i class="fa-solid fa-xmark"></i> Ofline !
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card mb-5 mt-5 mx-4 mx-md-auto shadow-5-strong col" style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                max-width: 850px;
                ">
                <div class="card-body py-5 px-md-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-5">Paramètres</h2>
                            <form action="../php/paramPost.php?iot=<?php echo $iot; ?>" method="POST">
                                <?php
                                for ($i = 2; $i < 6; $i++) {
                                    if ($i % 2 == 0) {
                                        ?>
                                        <div class="row g-5 mb-5">
                                        <?php
                                    }

                                    if ($parsed_status_list->{'status_list'}[$iot - 1]->{$tab[$i]} == 1) {
                                        ?>
                                            <div class="col">
                                                <!-- Checked switch -->
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="flexSwitchCheckChecked" name="<?php echo $tab[$i] ?>" checked />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">
                                                        <?php echo $tab[$i]; ?>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php
                                    } elseif ($parsed_status_list->{'status_list'}[$iot - 1]->{$tab[$i]} == 0) {
                                        ?>
                                            <div class="col">
                                                <!-- Default switch -->
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="flexSwitchCheckDefault" name="<?php echo $tab[$i] ?>" />
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">
                                                        <?php echo $tab[$i]; ?>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                    if ($i % 2 != 0) {
                                        ?>
                                        </div>
                                    <?php
                                    }
                                }
                                ?> <br>
                                <?php

                                ?>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Valider les Changements
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Section: Design Block -->
<?php
if (isset($_GET['modif'])) {
    ?>
    <div class="alert alert-success mt-4 mb-4" role="alert">
        Modifications réussie !
    </div>
<?php } ?>
<?php
?>