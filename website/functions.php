<?php
    function printIOT()
    {
        # Get status list and iot data from remote server
        $status_list = file_get_contents("https://ovl.tech-user.fr:6969/status_list/".$_SESSION["user"]["token"]);        
        $iot_list = file_get_contents("https://ovl.tech-user.fr:6969/iot_list/".$_SESSION["user"]["token"]);
        
        
        # Decode the JSON data into arrays
        $parsed_status_list = json_decode($status_list);
        $parsed_iot_list = json_decode($iot_list);
        $extract_iot_list = $parsed_iot_list->{'trackers'}->{'iotArray'};
        
        if($parsed_iot_list->{'error'}->{'Code'} == 0){

            # start of HTML table creation
            echo "<br>";
            echo "<table class='table table_modify container-xxl mt-5 mb-5'>";
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
            for($i = 0; $i < count($extract_iot_list); $i++)
            {
                $id = $i + 1;

                echo "<tr>";
                echo "<th scope='row'>", $parsed_iot_list->{'trackers'}->{'iotArray'}[$i]->{'id'}, "</th>";
                echo "<td>", $parsed_iot_list->{'trackers'}->{'iotArray'}[$i]->{'trackerName'},  "</td>";
                
                # Display "true" or "false" based on parsed data from $parsed_status_list
                if($parsed_status_list->{'status_list'}[$id - 1]->{'status_online'} == 1)
                {
                    echo "<td><i class='fa-solid fa-check'></i> Online !</td>";
                }else{
                    echo "<td><i class='fa-solid fa-xmark'></i> Offline !</td>";
                }
                
                # get historical data for the current IoT device
                $history = file_get_contents("https://ovl.tech-user.fr:6969/position/history/".$id."/");      
                $parsed_history = json_decode($history);
                
                if($parsed_history->{'error'}->{'Code'} == 0){
                    # repeat tracker name as X,Y position data is missing 
                    echo "<td>", end($parsed_history->{'history'})->{'lat'}, "</td>" ;
                    echo "<td>", end($parsed_history->{'history'})->{'lon'}, "</td>" ;
                    # link to view IoT device history
                    echo "<td><a href='/iot/historique.php?iot=",  ($i+1),  "'>",
                    "<button type='button' class='btn button_modify'>  See ",
                    "</button></a></td>";
                    echo "</tr>";
                }else{
                    # repeat tracker name as X,Y position data is missing 
                    echo "<td> NaN </td>" ;
                    echo "<td> NaN </td>" ;
                    echo "<td><button type='button' class='btn button_modify' disabled>  See ",
                    "</button></td>";
                    echo "</tr>";
                }
                
            }
            
            # end of table
            echo "</tbody>";
            echo "</table>";
        }else{
            echo $parsed_iot_list->{'error'}->{'Message'};
        }
    }


    /*
        PrintPos function used to show the device's history data on a table of html.
    */
    
    function printPos($history, $parsed_history){
        
        if($parsed_history->{'error'}->{'Code'} == 0){
            // Get the iot device's key from the URL
            $iot = $_GET["iot"];
            $pos = $_GET["pos"];
            $safezone = file_get_contents("https://ovl.tech-user.fr:6969/position/safezone/". $iot ."/");
            $safezone_Json = json_decode($safezone); 
            $_COOKIE['safezone']['lat'] = $safezone_Json->{'safezone'}->{'lat'};
            $_COOKIE['safezone']['lon'] = $safezone_Json->{'safezone'}->{'lon'};

            $extract_pos = json_decode($history)->{'history'};
            // HTML for creating a Bootstrap table
            ?>
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
                    for($i = count($extract_pos); $i > 0 ; $i--)
                    {
                        ?> 
                        <tr> 
                        <td> <?php echo date('d/m/Y H:i',$parsed_history->{'history'}[$i-1]->{'timestamp'}), '   ';?> </td> 
                        <td> <?php if(isset($parsed_history->{'history'}[$i-1]->{'lat'})) echo $parsed_history->{'history'}[$i-1]->{'lat'}, '   '; else echo "NaN" ?> </td> 
                        <td> <?php if(isset($parsed_history->{'history'}[$i-1]->{'lon'}))echo $parsed_history->{'history'}[$i-1]->{'lon'}, '   '; else echo "NaN"?> </td>
                        <td> <a href="/iot/historique.php?iot=<?php echo $iot ?>&pos=<?php echo $i-1 ?>"> <button type="button" class="btn button_modify">  See </button> </a> </td>
                        </tr> <?php 
                    } 
                    ?>
                </tbody>
            </table>
            <!-- "Global" and "Exporter" buttons --> 
            <a href="/iot/historique.php?iot=<?php echo $iot ?>"> <button type="button" class="btn button_modify">  Global </button> </a>
            <a href="/iot/historique.php?iot=<?php echo $iot?>"> <button type="button" class="btn button_modify">  Export </button> </a> 
            <?php
        }else{
            echo $parsed_history->{'error'}->{'Message'};
        }
    }

?>
