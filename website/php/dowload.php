<?php
include 'initLink.php';

// Define the name of the file to be downloaded
$filename = "map.gpx";

if(isset($_GET['iot']))
{
    $id = $_GET['iot'];
    $gpx_download = file_get_contents($API_link ."/position/gpx/" . $id . "/" . $id);
    $parsed_gpx_download = json_decode($gpx_download);

    echo $parsed_gpx_download->{'gpx'};
    echo $filename;

    // Write the content to a GPX file
    file_put_contents($filename, $parsed_gpx_download->{'gpx'});

    // Check if the file exists
    if (file_exists($filename)) {
        // Force the download of the file using headers
        header('Content-Type: application/gpx+xml');
        header('Content-Disposition: attachment; filename=' . basename($filename));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));

        // Read the file and offer it for download
        readfile($filename);

        // Try to delete the file
        if (unlink($filename)) {
            echo "The file $filename was successfully deleted.";
        } else {
            echo "An error occurred while trying to delete the file $filename.";
        }

        // Terminate the script after file download and deletion
        exit;
    } else {
        echo "The file $filename does not exist.";
    }
    
}
header('Location: '. $Website_link .'historique.php?iot='.$iot);
?>
