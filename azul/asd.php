<?php
$check_unit = "SELECT * FROM unit";
    $check_unit_query = mysqli_query($conn, $check_unit);
    if($check_unit_query->num_rows>0){
        while($row=$check_unit_query->fetch_assoc()){
            $unit_id = $row['id'];
            $unit_name = strtoupper($row['name']);
            break;
        }

        if(isset($unit_id)){
            $insert_unit = "INSERT INTO unit SET `name` = '$unit'";
            if($conn->query($insert_unit) === TRUE ){
                $unit_id = $conn->insert_id;
            }
        }
    }

    