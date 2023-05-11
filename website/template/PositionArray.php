<?php
if ($parsed_history->{'error'}->{'Code'} == 0) {
    // Get the iot device's key from the URL
    $iot = $_GET["iot"];
    $pos = $_GET["pos"];
    $safezone = file_get_contents($API_link . "/position/safezone/" . $iot . "/");
    $safezone_Json = json_decode($safezone);
    $_COOKIE['safezone']['lat'] = $safezone_Json->{'safezone'}->{'lat'};
    $_COOKIE['safezone']['lon'] = $safezone_Json->{'safezone'}->{'lon'};

    $extract_pos = json_decode($history)->{'history'};
    // HTML for creating a Bootstrap table
?>
    <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table_modify container-xxl">
            <thead class="table-dark table_modify">
                <th scope="col">Date</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col"></th>
            </thead>
            <tbody>
                <?php
                // Loop through the history data and create table rows
                for ($i = count($extract_pos); $i > 0; $i--) {
                ?>
                    <tr>
                        <td> <?php echo date('d/m/Y H:i', $parsed_history->{'history'}[$i - 1]->{'timestamp'}), '   '; ?> </td>
                        <td> <?php if (isset($parsed_history->{'history'}[$i - 1]->{'lat'})) echo $parsed_history->{'history'}[$i - 1]->{'lat'}, '   ';
                                else echo "NaN" ?> </td>
                        <td> <?php if (isset($parsed_history->{'history'}[$i - 1]->{'lon'})) echo $parsed_history->{'history'}[$i - 1]->{'lon'}, '   ';
                                else echo "NaN" ?> </td>
                        <td> <a href="/historique.php?iot=<?php echo $iot ?>&pos=<?php echo $i - 1 ?>"> <button type="button" class="btn button_modify"> See </button> </a> </td>
                    </tr> <?php
                        }
                            ?>
            </tbody>
        </table>
    </div>
    <!-- "Global" and "Exporter" buttons -->
    <a href="/historique.php?iot=<?php echo $iot ?>"> <button type="button" class="btn button_modify"> Global </button> </a>
    <a href="php/dowload.php?iot=<?php echo $iot ?>"> <button type="button" class="btn button_modify"> Export </button> </a>
<?php
} else {
    echo $parsed_history->{'error'}->{'Message'};
}
?>