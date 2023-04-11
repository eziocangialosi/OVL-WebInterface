<!-- Main container with fluid margins and spacing -->
<div class="container-fluid mb-5 container_status">
    <?php
    // Fetch and parse the list of statuses
    $status_list = file_get_contents($API_link . "/status_list/" . $_SESSION["user"]["token"]);
    $parsed_status_list = json_decode($status_list);

    // Define a lookup table for status types
    $tab = array(
        1 => "status_charge",
        2 => "status_alarm",
        3 => "status_ecomode",
        4 => "status_protection",
        5 => "status_vh_charge",
        6 => "status_gps"
    );
    ?>
</div>

<!-- Section: Design Block -->
<section class="text-center param pb-5 pt-5" id="param">
    <div class="row" style="margin-right: 0 !important;">
        <!-- Left Column: Status -->
        <div class="col-sm-6">
            <div class="card mb-5 mt-5 mx-4 mx-md-auto shadow-5-strong" style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                max-width: 850px;
                ">
                <div class="card-body card_modify py-5 px-md-5">
                    <h2 class="fw-bold mb-5">Status</h2>
                    <!-- Battery Charge Progress Bar -->
                    <div class="col" style="max-width: 500px; margin: auto;">
                        <h4>Battery Charge</h4>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar" role="progressbar" style="width: <?php echo $parsed_status_list->{'status_list'}[$iot - 1]->{"status_bat"}; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $parsed_status_list->{'status_list'}[$iot - 1]->{"status_bat"}; ?>%
                            </div>
                        </div>
                    </div>
                    <!-- Tracker Status -->
                    <div class="col mt-5" style="max-width: 500px; margin: auto;">
                        <h4>Status du Traqueur : </h4> <br>
                        <?php
                        if ($parsed_status_list->{'status_list'}[$iot - 1]->{'status_online'} == 1) {
                        ?>
                            <i class="fa-solid fa-check"></i> Online !
                        <?php
                        } else {
                        ?>
                            <i class="fa-solid fa-xmark"></i> Offline !
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Parameters -->
        <div class="col-sm-6">
            <div class="card mb-5 mt-5 mx-4 card_modify mx-md-auto shadow-5-strong col" style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                max-width: 850px;
                ">
                <div class="card-body py-5 px-md-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-5">Parameters</h2>
                            <!-- Parameters Form -->
                            <form action="../php/paramPost.php?iot=<?php echo $iot; ?>" method="POST">
                                <!-- Loop through the status types -->
                                <?php
                                for ($i = 2; $i < 6; $i++) {
                                    // Start a new row for every even index
                                    if ($i % 2 == 0) {
                                        echo '<div class="row g-5 mb-5">';
                                    }

                                    // Get the current status
                                    $current_status = $parsed_status_list->{'status_list'}[$iot - 1]->{$tab[$i]};
                                ?>
                                    <div class="col">
                                        <!-- Switch -->
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="<?php echo ($current_status == 1) ? 'flexSwitchCheckChecked' : 'flexSwitchCheckDefault'; ?>" name="<?php echo $tab[$i]; ?>" <?php echo ($current_status == 1) ? 'checked' : ''; ?> />
                                            <label class="form-check-label" for="<?php echo ($current_status == 1) ? 'flexSwitchCheckChecked' : 'flexSwitchCheckDefault'; ?>">
                                                <?php echo $tab[$i]; ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php

                                    // Close the row for every odd index
                                    if ($i % 2 != 0) {
                                        echo '</div>';
                                    }
                                }
                                ?> <br>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4 button_modify">
                                    validate changes
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

<!-- Display success message if the modification was successful -->
<?php
if (isset($_GET['modif'])) {
?>
    <div class="alert alert-success mt-4 mb-4 alert_test alert-dismissible" role="alert">
        Successful modification!
        <a href="#" class="close" data-dismiss="alert" style="margin-left: 20px; margin-right: 20px" aria-label="close"><i class="fa-solid fa-xmark"></i></a>
    </div>
<?php } ?>