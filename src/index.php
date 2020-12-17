<?php
    $link = new mysqli("acadmysql.duc.auburn.edu", "jdg0058", "Comp5120Group2", "jdg0058db");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query_string=stripcslashes($_POST['query']);
    //$result = $link->query($query_string);

    $result = mysqli_query($link,$query_string) or die('ERROR: '.mysqli_error($link));

    //print strval($result);
    if(!$result) {
        echo $mys->error;
    }
    else {
        $table_str = '<table><tr>';
        $row = $result->fetch_assoc();
        foreach ($row as $col => $value) {
            $table_str = $table_str."<th>".(strval($col))."</th>";
        }
        $table_str = $table_str."</tr>";
    
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            $table_str = $table_str."<tr>";
            foreach($row as $key => $value){
                $table_str = $table_str."<td>".(strval($value))."</td>";
            }
            $table_str = $table_str."</tr>";
        }
        $table_str = $table_str."</table>";
        echo $table_str;
    }

?>