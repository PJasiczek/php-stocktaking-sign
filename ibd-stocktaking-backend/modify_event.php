<?php

include 'dbconfig.php';

$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

$json = file_get_contents('php://input');

$obj = json_decode($json, true);

$event_code = $obj['event_code'];
$name = $obj['name'];
$type = $obj['type'];
$date = $obj['date'];
$start_time = $obj['start_time'];
$end_time = $obj['end_time'];
$street_name = $obj['street_name'];
$house_number = $obj['house_number'];
$apartment_number = $obj['apartment_number'];
$city_name = $obj['city_name'];
$hour_price = $obj['hour_price'];
$free_places_count = $obj['free_places_count'];
$places_count = $obj['places_count'];
$description = $obj['description'];

$CheckSQL = "SELECT * FROM events WHERE event_code='$event_code'";

$Check = mysqli_fetch_array(mysqli_query($con, $CheckSQL));

if (isset($Check)) {
    if ($result = mysqli_query($con, $CheckSQL)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $address_id = $row['address_id'];
                if ($city_name != NULL) {

                    $Sql_Query_City_Id_Get_Query = "SELECT * FROM cities WHERE city_name='$city_name'";

                    $Check_Sql_Query_City_Id_Get_Query = mysqli_fetch_array(mysqli_query($con, $Sql_Query_City_Id_Get_Query));

                    if (isset($Check_Sql_Query_City_Id_Get_Query)) {

                        if ($result1 = mysqli_query($con, $Sql_Query_City_Id_Get_Query)) {
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row = mysqli_fetch_array($result1)) {
                                    $Sql_Insert_Address_Query = "UPDATE addresses SET city_id=" . $row['city_id'] . ", street_name='$street_name', house_number='$house_number', apartment_number='$apartment_number' WHERE address_id='$address_id';";

                                    if (mysqli_query($con, $Sql_Insert_Address_Query)) {

                                        $Sql_Query_Update_User = "UPDATE events SET name='$name', type='$type', date='$date', start_time='$start_time', end_time='$end_time', address_id='$address_id', hour_price='$hour_price', free_places_count='$free_places_count', places_count='$places_count', description='$description' WHERE event_code='$event_code'";

                                        if (mysqli_query($con, $Sql_Query_Update_User)) {

                                            $MSG = 'Nastąpiło poprawna modyfikacja zlecenia';

                                            $json = json_encode($MSG);

                                            echo $json;
                                        } else {
                                            echo 'Spóbuj ponownie';
                                        }
                                    } else {
                                        echo 'Spóbuj ponownie';
                                    }
                                }
                            }
                        }
                    } else {

                        $Sql_Insert_Cities_Query = "INSERT INTO cities (city_name) VALUES ('$city_name')";

                        if (mysqli_query($con, $Sql_Insert_Cities_Query)) {
                            $Sql_Query_City_Id_Get_Query = "SELECT * FROM cities WHERE city_name='$city_name'";

                            $Check_Sql_Query_City_Id_Get_Query = mysqli_fetch_array(mysqli_query($con, $Sql_Query_City_Id_Get_Query));

                            if (isset($Check_Sql_Query_City_Id_Get_Query)) {

                                if ($result1 = mysqli_query($con, $Sql_Query_City_Id_Get_Query)) {
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row = mysqli_fetch_array($result1)) {
                                            $Sql_Insert_Address_Query = "UPDATE addresses SET city_id=" . $row['city_id'] . ", street_name='$street_name', house_number='$house_number', apartment_number='$apartment_number' WHERE address_id='$address_id';";

                                            if (mysqli_query($con, $Sql_Insert_Address_Query)) {

                                                $Sql_Query_Update_User = "UPDATE events SET name='$name', type='$type', date='$date', start_time='$start_time', end_time='$end_time', address_id='$address_id', hour_price='$hour_price', free_places_count='$free_places_count', places_count='$places_count', description='$description' WHERE event_code='$event_code'";

                                                if (mysqli_query($con, $Sql_Query_Update_User)) {

                                                    $MSG = 'Nastąpiło poprawna modyfikacja zlecenia';

                                                    $json = json_encode($MSG);

                                                    echo $json;
                                                } else {
                                                    echo 'Spóbuj ponownie';
                                                }
                                            } else {
                                                echo 'Spóbuj ponownie';
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo 'Spóbuj ponownie';
                        }
                    }
                }
            }
        }
    }
}

mysqli_close($con);
?>
