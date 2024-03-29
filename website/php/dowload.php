<?php
include 'initLink.php';

// Define the name of the file to be downloaded
$filename = "map.gpx";

if(isset($_GET['iot']))
{
    $iot = $_GET['iot'];
    $gpx_download = file_get_contents($API_link ."/position/gpx/" . $iot . "/" . $iot);
    $parsed_gpx_download = json_decode($gpx_download);

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
            //The file was successfully deleted.
        } else {
            //An error occurred while trying to delete the file 
        }
        exit;
    } else {
        echo "The file ".$filename." does not exist.";
    }
}
?>
