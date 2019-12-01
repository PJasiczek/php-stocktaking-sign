<?php

include 'dbconfig.php';

$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

$json = file_get_contents('php://input');

$obj = json_decode($json, true);

$email = $obj['email'];
$password = $obj['password'];
$street_name = $obj['street_name'];
$house_number = $obj['house_number'];
$apartment_number = $obj['apartment_number'];
$city_name = $obj['city_name'];
$telephone_number = $obj['telephone_number'];
$bank_account_number = $obj['bank_account_number'];
$is_pregnant = $obj['is_pregnant'];

$CheckSQL = "SELECT * FROM users WHERE email='$email'";

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

                                        $Sql_Query_Update_User = "UPDATE users SET password='$password', email='$email', telephone_number='$telephone_number', bank_account_number='$bank_account_number', is_pregnant='$is_pregnant' WHERE email='$email';";

                                        if (mysqli_query($con, $Sql_Query_Update_User)) {

                                            $MSG = 'Nastąpiło poprawna modyfikacja konta';

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

                                                $Sql_Query_Update_User = "UPDATE users SET password='$password', email='$email', telephone_number='$telephone_number', bank_account_number='$bank_account_number', is_pregnant='$is_pregnant' WHERE email='$email';";

                                                if (mysqli_query($con, $Sql_Query_Update_User)) {

                                                    $MSG = 'Nastąpiło poprawna modyfikacja konta';

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
