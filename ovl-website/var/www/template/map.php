<?php
$iot = $_GET['iot'];
$history = file_get_contents($API_link ."/position/history/" . $iot . "/");
$parsed_history = json_decode($history);
$extract_pos = $parsed_history->{'history'};

$safezone = file_get_contents($API_link ."/position/safezone/" . $iot . "/");
$parsed_safezone = json_decode($safezone);
?>

<script type="text/javascript">
    <?php
    if (isset($_GET['pos'])) {
        $pos = $_GET["pos"];
        ?>

        var map = L.map('map').setView([<?php echo $extract_pos[$pos]->{'lat'} ?>, <?php echo $extract_pos[$pos]->{'lon'} ?>], 20); //MODIFIER COORDS ICI

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var marker = L.marker([<?php echo $extract_pos[$pos]->{'lat'} ?>, <?php echo $extract_pos[$pos]->{'lon'} ?>]).addTo(map); //COORDS D'UN POINT SUR LA CARTE
        L.circle([<?php echo $parsed_safezone->{'safezone'}->{'lon'} ?>, <?php echo $parsed_safezone->{'safezone'}->{'lat'} ?>], {
            color: 'blue',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: <?php echo $parsed_safezone->{'safezone'}->{'diameter'} ?>
        }).addTo(map);

        <?php
    } else {
        ?>
        var map = L.map('map').setView([0, 0], 2); //MODIFIER COORDS ICI

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        L.circle([<?php echo $parsed_safezone->{'safezone'}->{'lon'} ?>, <?php echo $parsed_safezone->{'safezone'}->{'lat'} ?>], {
            color: 'blue',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: <?php echo $parsed_safezone->{'safezone'}->{'diameter'} ?>
        }).addTo(map);

        var latlngs = [];

        <?php
        for ($i = 0; $i < count($extract_pos); $i++) {
            ?>
            var temp = [<?php echo $extract_pos[$i]->{'lat'} ?>, <?php echo $extract_pos[$i]->{'lon'} ?>];
            latlngs.push(temp);

            var marker = L.marker([<?php echo $extract_pos[$i]->{'lat'} ?>, <?php echo $extract_pos[$i]->{'lon'} ?>]).addTo(map); //COORDS D'UN POINT SUR LA CARTE
            <?php
        }
        ?>
        var aPolyline = L.polyline(latlngs, { color: 'red' }).addTo(map);
        map.fitBounds(aPolyline.getBounds());
        <?php
    }

    ?>

</script>