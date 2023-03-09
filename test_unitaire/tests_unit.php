<?php
    function getIOT()
    {
        $link = "https://ovl.tech-user.fr:6969/lazy/position/history/42/";
        $iot_list = file_get_contents($link);

        # start of HTML table creation
        echo "<br>";
        echo "<table class='table table-bordered table_modify container-xxl mt-5 mb-5' id='history'>";
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
        echo "<td>\$json_decode->{'trackers'}->{'iotArray'}[\$i]->{'id'}</td>";
        echo "</tr>";   

        # end of table
        echo "</tbody>";
        echo "</table>";


    }
    function getStatus()
    {
        $link = "https://ovl.tech-user.fr:6969/lazy/status_list/42/";
        $stat_list = file_get_contents($link);

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
        echo "<td>\$json_decode->{'trackers'}->{'iotArray'}[\$i]->{'id'}</td>";
        echo "</tr>";   

        # end of table
        echo "</tbody>";
        echo "</table>";
    }
    function getPos()
    {
        $link = "https://ovl.tech-user.fr:6969/lazy/position/history/42/";
        $historique = file_get_contents($link);

        # start of HTML table creation
        echo "<br>";
        echo "<table class='table table-bordered table_modify container-xxl mt-5 mb-5' id='historique_position'>";
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
        echo "<td>\$json_decode->{'trackers'}->{'iotArray'}[\$i]->{'id'}</td>";
        echo "</tr>";   

        # end of table
        echo "</tbody>";
        echo "</table>";
        
    }
    function getUser()
    {
        $link = "https://ovl.tech-user.fr:6969/user/test@gmail.com/mdp";
        //Get user data from the API using email and password
        $users_verif = file_get_contents($link);
        echo "Voici le renvoi de l'API en brut pour une demande de verification de l'utilisateur se connectant : <br>".$users_verif;
    }
    function getPosNow()
    {
        $link = "https://ovl.tech-user.fr:6969/position/now/1/";
        //Get user data from the API using email and password
        $pos_list = file_get_contents($link);
        echo "Voici le renvoi de l'API en brut pour une demande de la position actuel de l'iot : <br>". $pos_list;
    }
?>