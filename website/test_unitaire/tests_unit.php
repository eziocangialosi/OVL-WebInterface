<?php
    function getIOT()
    {
        $link = "https://ovl.tech-user.fr:6969/lazy/position/history/42/";
        $iot_list = file_get_contents($link);
        $iot_list_decode = json_decode($iot_list);

        # start of HTML table creation
        echo "<br>";
        echo "<table class='table table-bordered table_modify container-xxl mt-5 mb-5' id=''>";
        echo     "<thead class='table-dark table_modify'>";
        echo         "<th scope='col'>GET</th>";
        echo         "<th scope='col' style='text-align:center'>".$link."</th>";
        echo     "</thead>";
        echo     "<tbody>";
                    
        echo "<tr>";
        echo "<td>Used to</td>";
        echo "<td>Get the tracker list for the user from his token.</td>";
        echo "</tr>";        
        
        echo "<tr>";
        echo "<td>Json Output</td>";
        echo "<td>".$iot_list."</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Extract exemple</td>";
        echo "<td>\$json_decode->{'history'}[1]->{'lat'}</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Result</td>";
        echo "<td>".$iot_list_decode->{'history'}[1]->{'lat'}."</td>";
        echo "</tr>";   

        # end of table
        echo "</tbody>";
        echo "</table>";


    }
    function getStatus()
    {
        $link = "https://ovl.tech-user.fr:6969/lazy/status_list/42/";
        $stat_list = file_get_contents($link);
        $stat_list_decode = json_decode($stat_list);

        # start of HTML table creation
        echo "<br>";
        echo "<table class='table table-bordered table_modify container-xxl mt-5 mb-5' id='stat_list'>";
        echo     "<thead class='table-dark table_modify'>";
        echo         "<th scope='col'>GET</th>";
        echo         "<th scope='col' style='text-align:center'>".$link."</th>";
        echo     "</thead>";
        echo     "<tbody>";
                    
        echo "<tr>";
        echo "<td>Used to</td>";
        echo "<td>Obtain the status list of all the user's trackers from his token.</td>";
        echo "</tr>";        
        
        echo "<tr>";
        echo "<td>Json Output</td>";
        echo "<td>".$stat_list."</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Extract exemple</td>";
        echo "<td>\$json_decode->{'status_list'}[0]->{'bat'}</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Result</td>";
        echo "<td>".$stat_list_decode->{'status_list'}[0]->{'bat'}."</td>";
        echo "</tr>";   

        # end of table
        echo "</tbody>";
        echo "</table>";
    }
    function getPos()
    {
        $link = "https://ovl.tech-user.fr:6969/lazy/position/history/42/";
        $historique = file_get_contents($link);
        $historique_decode = json_decode($historique);

        # start of HTML table creation
        echo "<br>";
        echo "<table class='table table-bordered table_modify container-xxl mt-5 mb-5' id='getPos'>";
        echo     "<thead class='table-dark table_modify'>";
        echo         "<th scope='col'>GET</th>";
        echo         "<th scope='col' style='text-align:center'>".$link."</th>";
        echo     "</thead>";
        echo     "<tbody>";
                    
        echo "<tr>";
        echo "<td>Used to</td>";
        echo "<td>Obtain all position history of a tracker based on his id.</td>";
        echo "</tr>";        
        
        echo "<tr>";
        echo "<td>Json Output</td>";
        echo "<td>".$historique."</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Extract exemple</td>";
        echo "<td>\$json_decode->{'history'}[1]->{'lat'}</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Result</td>";
        echo "<td>".$historique_decode->{'history'}[1]->{'lat'}."</td>";
        echo "</tr>";   

        # end of table
        echo "</tbody>";
        echo "</table>";
        
    }
    function getUser()
    {
        $link = "https://ovl.tech-user.fr:6969/lazy/user/test@gmail.com/test123";
        //Get user data from the API using email and password
        $users_verif = file_get_contents($link);
        $users_verif_decode = json_decode($users_verif);

        # start of HTML table creation
        echo "<br>";
        echo "<table class='table table-bordered table_modify container-xxl mt-5 mb-5' id='verify_users'>";
        echo     "<thead class='table-dark table_modify'>";
        echo         "<th scope='col'>GET</th>";
        echo         "<th scope='col' style='text-align:center'>".$link."</th>";
        echo     "</thead>";
        echo     "<tbody>";
                    
        echo "<tr>";
        echo "<td>Used to</td>";
        echo "<td>Get the tracker list for the user from his token.</td>";
        echo "</tr>";        
        
        echo "<tr>";
        echo "<td>Json Output</td>";
        echo "<td>".$users_verif."</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Extract exemple</td>";
        echo "<td>\$json_decode->{'error'}->{'Message'}</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Result</td>";
        echo "<td>".$users_verif_decode->{'error'}->{'Message'}."</td>";
        echo "</tr>";   

        # end of table
        echo "</tbody>";
        echo "</table>";
    }
    function getPosNow()
    {
        $link = "https://ovl.tech-user.fr:6969/lazy/position/now/1/";
        //Get user data from the API using email and password
        $pos_list = file_get_contents($link);
        $pos_list_decode = json_decode($pos_list);
        
        # start of HTML table creation
        echo "<br>";
        echo "<table class='table table-bordered table_modify container-xxl mt-5 mb-5' id='getPosNow'>";
        echo     "<thead class='table-dark table_modify'>";
        echo         "<th scope='col'>GET</th>";
        echo         "<th scope='col' style='text-align:center'>".$link."</th>";
        echo     "</thead>";
        echo     "<tbody>";
                    
        echo "<tr>";
        echo "<td>Used to</td>";
        echo "<td>Get the tracker list for the user from his token.</td>";
        echo "</tr>";        
        
        echo "<tr>";
        echo "<td>Json Output</td>";
        echo "<td>".$pos_list."</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Extract exemple</td>";
        echo "<td>\$json_decode->{'error'}->{'Code'}</td>";
        echo "</tr>";   

        echo "<tr>";
        echo "<td>Result</td>";
        echo "<td>".$pos_list_decode->{'error'}->{'Code'}."</td>";
        echo "</tr>";   

        # end of table
        echo "</tbody>";
        echo "</table>";
    }
?>