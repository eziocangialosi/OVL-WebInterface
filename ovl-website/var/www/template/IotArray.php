<?php
# Get status list and iot data from remote server
$status_list = file_get_contents($API_link ."/status_list/" . $_SESSION["user"]["token"]);
$iot_list = file_get_contents($API_link ."/iot_list/" . $_SESSION["user"]["token"]);


# Decode the JSON data into arrays
$parsed_status_list = json_decode($status_list);
$parsed_iot_list = json_decode($iot_list);
$extract_iot_list = $parsed_iot_list->{'trackers'}->{'iotArray'};

if ($parsed_iot_list->{'error'}->{'Code'} == 0) {

    # start of HTML table creation
    echo "<br>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table_modify table-responsive container-xxl mt-5 mb-5'>";
    echo     "<thead class='table-dark table_modify'>";
    echo         "<th scope='col'>#</th>";
    echo         "<th scope='col'>Name</th>";
    echo         "<th scope='col'>Status</th>";
    echo         "<th scope='col'>PosX</th>";
    echo         "<th scope='col'>PosY</th>";
    echo         "<th scope='col'></th>";
    echo     "</thead>";
    echo     "<tbody>";

    # used to display IoT device data in a table row
    for ($i = 0; $i < count($extract_iot_list); $i++) {
        $id = $i + 1;

        echo "<tr>";
        echo "<th scope='row'>", $parsed_iot_list->{'trackers'}->{'iotArray'}[$i]->{'id'}, "</th>";
        echo "<td>", $parsed_iot_list->{'trackers'}->{'iotArray'}[$i]->{'trackerName'},  "</td>";

        # Display "true" or "false" based on parsed data from $parsed_status_list
        if ($parsed_status_list->{'status_list'}[$id - 1]->{'status_online'} == 1) {
            echo "<td><i class='fa-solid fa-check'></i> Online !</td>";
        } else {
            echo "<td><i class='fa-solid fa-xmark'></i> Offline !</td>";
        }

        # get historical data for the current IoT device
        $history = file_get_contents($API_link ."/position/history/" . $id . "/");
        $parsed_history = json_decode($history);

        if ($parsed_history->{'error'}->{'Code'} == 0) {
            # repeat tracker name as X,Y position data is missing 
            echo "<td>", end($parsed_history->{'history'})->{'lat'}, "</td>";
            echo "<td>", end($parsed_history->{'history'})->{'lon'}, "</td>";
            # link to view IoT device history
            echo "<td><a href='historique.php?iot=", ($i + 1),  "'>",
            "<button type='button' class='btn button_modify'>  See ",
            "</button></a></td>";
            echo "</tr>";
        } else {
            # repeat tracker name as X,Y position data is missing 
            echo "<td> NaN </td>";
            echo "<td> NaN </td>";
            echo "<td><button type='button' class='btn button_modify' disabled>  See ",
            "</button></td>";
            echo "</tr>";
        }
    }

    # end of table
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo $parsed_iot_list->{'error'}->{'Message'};
}
