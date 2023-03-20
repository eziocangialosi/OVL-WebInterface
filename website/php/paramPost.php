<?php
include 'initLink.php';
$iot = $_GET['iot'];
$tab = array(1 => "status_alarm", 2 => "status_ecomode", 3 => "status_protection", 4 => "status_vh_charge");
$tabValue = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0);

// Loop through the array and set the value for each status
for ($i = 1; $i < 5; $i++) {
    if ($_POST[$tab[$i]] != "") {
        $tabValue[$i] = 1;
    } else {
        $tabValue[$i] = 0;
    }
    echo $tabValue[$i];
}

// API endpoint to update status
$url = $API_link . "/set/status/";
$data = array(
    'id_iot' => $iot,
    'status_alarm' => $tabValue[1],
    'status_ecomode' => $tabValue[2],
    'status_protection' => $tabValue[3],
    'status_vh_charge' => $tabValue[4]
);

// Initialize cURL and set options
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

// Execute cURL request and get status
$response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// Check for errors and display them
if ($status != 200) {
    die("Error: call to URL $url failed with status $status, response $response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}

// Close cURL and redirect
curl_close($curl);
header('Location: https://ovl.tech-user.fr:7070/historique.php?iot=' . $iot . '&modif=1#param');

?>
