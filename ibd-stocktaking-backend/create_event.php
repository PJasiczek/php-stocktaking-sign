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

$check = mysqli_fetch_array(mysqli_query($con, $CheckSQL));

if (isset($check)) {

    $ReturnJsonMSG = 'Zlecenie istnieje już w systemie';

    $ReturnJson = json_encode($ReturnJsonMSG);

    echo $ReturnJson;
} else {

    $Sql_Query_City_Id_Get_Query = "SELECT * FROM cities WHERE city_name='$city_name'";

    $Check_Sql_Query_City_Id_Get_Query = mysqli_fetch_array(mysqli_query($con, $Sql_Query_City_Id_Get_Query));

    if (isset($Check_Sql_Query_City_Id_Get_Query)) {

        if ($result = mysqli_query($con, $Sql_Query_City_Id_Get_Query)) {
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $Sql_Insert_Address_Query = "INSERT INTO addresses (city_id, street_name, house_number, apartment_number) VALUES (" . $row['city_id'] . ", '$street_name', '$house_number', '$apartment_number')";
                    $Sql_Query_Address_Id_Get_Query = "SELECT * FROM addresses WHERE city_id='" . $row['city_id'] . "' AND street_name='$street_name' AND house_number='$house_number' AND apartment_number='$apartment_number'";

                    $Check_Sql_Query_Address_Id_Get_Query = mysqli_fetch_array(mysqli_query($con, $Sql_Query_Address_Id_Get_Query));

                    if (isset($Check_Sql_Query_Address_Id_Get_Query)) {

                        if ($result = mysqli_query($con, $Sql_Query_Address_Id_Get_Query)) {
                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_array($result)) {
                                    $Sql_Query = "INSERT INTO events (event_code, name, type, date, start_time, end_time, address_id, hour_price, free_places_count, places_count, description) VALUES ('$event_code','$name','$type','$date','$start_time','$end_time'," . $row['address_id'] . ", '$hour_price','$free_places_count','$places_count','$description')";

                                    if (mysqli_query($con, $Sql_Query)) {

                                        $MSG = 'Nastąpiło poprawne utworzenie zlecenia';

                                        $json = json_encode($MSG);

                                        echo $json;
                                    } else {
                                        echo 'Spóbuj ponownie';
                                    }
                                }
                                mysqli_free_result($result);
                            } else {
                                echo "Brak danych";
                            }
                        }
                    } else {
                        if (mysqli_query($con, $Sql_Insert_Address_Query)) {
                            if ($result = mysqli_query($con, $Sql_Query_Address_Id_Get_Query)) {
                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_array($result)) {
                                        $Sql_Query = "INSERT INTO events (event_code, name, type, date, start_time, end_time, address_id, hour_price, free_places_count, places_count, description) VALUES ('$event_code','$name','$type','$date','$start_time','$end_time'," . $row['address_id'] . ", '$hour_price','$free_places_count','$places_count','$description')";

                                        if (mysqli_query($con, $Sql_Query)) {

                                            $MSG = 'Nastąpiło poprawne utworzenie zlecenia';

                                            $json = json_encode($MSG);

                                            echo $json;
                                        } else {
                                            echo 'Spóbuj ponownie';
                                        }
                                    }
                                    mysqli_free_result($result);
                                } else {
                                    echo "Brak danych";
                                }
                            }
                        }
                    }
                }
                mysqli_free_result($result);
            } else {
                echo "Brak danych";
            }
        }
    } else {

        $Sql_Insert_Cities_Query = "INSERT INTO cities (city_name) VALUES ('$city_name')";

        if (mysqli_query($con, $Sql_Insert_Cities_Query)) {

            if ($result = mysqli_query($con, $Sql_Query_City_Id_Get_Query)) {
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                        $Sql_Insert_Address_Query = "INSERT INTO addresses (city_id, street_name, house_number, apartment_number) VALUES (" . $row['city_id'] . ", '$street_name', '$house_number', '$apartment_number')";
                        $Sql_Query_Address_Id_Get_Query = "SELECT * FROM addresses WHERE city_id='" . $row['city_id'] . "' AND street_name='$street_name' AND house_number='$house_number' AND apartment_number='$apartment_number'";

                        $Check_Sql_Query_Address_Id_Get_Query = mysqli_fetch_array(mysqli_query($con, $Sql_Query_Address_Id_Get_Query));

                        if (isset($Check_Sql_Query_Address_Id_Get_Query)) {

                            if ($result = mysqli_query($con, $Sql_Query_Address_Id_Get_Query)) {
                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_array($result)) {
                                        $Sql_Query = "INSERT INTO events (event_code, name, type, date, start_time, end_time, address_id, hour_price, free_places_count, places_count, description) VALUES ('$event_code','$name','$type','$date','$start_time','$end_time'," . $row['address_id'] . ", '$hour_price','$free_places_count','$places_count','$description')";

                                        if (mysqli_query($con, $Sql_Query)) {

                                            $MSG = 'Nastąpiło poprawne utworzenie zlecenia';

                                            $json = json_encode($MSG);

                                            echo $json;
                                        } else {
                                            echo 'Spóbuj ponownie';
                                        }
                                    }
                                    mysqli_free_result($result);
                                } else {
                                    echo "Brak danych";
                                }
                            }
                        } else {
                            if (mysqli_query($con, $Sql_Insert_Address_Query)) {
                                if ($result = mysqli_query($con, $Sql_Query_Address_Id_Get_Query)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {
                                            $Sql_Query = "INSERT INTO events (event_code, name, type, date, start_time, end_time, address_id, hour_price, free_places_count, places_count, description) VALUES ('$event_code','$name','$type','$date','$start_time','$end_time'," . $row['address_id'] . ", '$hour_price','$free_places_count','$places_count','$description')";

                                            if (mysqli_query($con, $Sql_Query)) {

                                                $MSG = 'Nastąpiło poprawne utworzenie zlecenia';

                                                $json = json_encode($MSG);

                                                echo $json;
                                            } else {
                                                echo 'Spóbuj ponownie';
                                            }
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                        echo "Brak danych";
                                    }
                                }
                            }
                        }
                    }
                    mysqli_free_result($result);
                } else {
                    echo "Brak danych";
                }
            }
        }
    }
}
mysqli_close($con);
?>
