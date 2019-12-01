<?php

include 'dbconfig.php';

$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

$json = file_get_contents('php://input');

$obj = json_decode($json, true);

$email = $obj['email'];
$password = $obj['password'];
$first_name = $obj['first_name'];
$last_name = $obj['last_name'];
$sex = $obj['sex'];
$date_of_birth = $obj['date_of_birth'];
$street_name = $obj['street_name'];
$house_number = $obj['house_number'];
$apartment_number = $obj['apartment_number'];
$city_name = $obj['city_name'];
$telephone_number = $obj['telephone_number'];
$bank_account_number = $obj['bank_account_number'];
$is_pregnant = $obj['is_pregnant'];

$CheckSQL = "SELECT * FROM users WHERE email='$email'";

$check = mysqli_fetch_array(mysqli_query($con, $CheckSQL));

if (isset($check)) {

    $ReturnJsonMSG = 'Użytkownik istnieje już w systemie';

    $ReturnJson = json_encode($ReturnJsonMSG);

    echo $ReturnJson;
} else {

    if ($email != NULL && $password != NULL && $first_name != NULL && $last_name != NULL && $date_of_birth != "--" && $sex != NULL && $telephone_number != NULL && $bank_account_number != NULL) {


        $Sql_Query_City_Id_Get_Query = "SELECT * FROM cities WHERE city_name='$city_name'";


        $Check_Sql_Query_City_Id_Get_Query = mysqli_fetch_array(mysqli_query($con, $Sql_Query_City_Id_Get_Query));

        if (isset($Check_Sql_Query_City_Id_Get_Query)) {

            if ($result = mysqli_query($con, $Sql_Query_City_Id_Get_Query)) {
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                        $Sql_Insert_Address_Query = "INSERT INTO addresses (city_id, street_name, house_number, apartment_number) VALUES (" . $row['city_id'] . ", '$street_name', '$house_number', '$apartment_number')";
                        $Sql_Query_Address_Id_Get_Query = "SELECT * FROM addresses WHERE city_id=" . $row['city_id'] . " AND street_name='$street_name' AND house_number='$house_number' AND apartment_number='$apartment_number'";

                        $Check_Sql_Query_Address_Id_Get_Query = mysqli_fetch_array(mysqli_query($con, $Sql_Query_Address_Id_Get_Query));

                        if (isset($Check_Sql_Query_Address_Id_Get_Query)) {

                            if ($result = mysqli_query($con, $Sql_Query_Address_Id_Get_Query)) {
                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_array($result)) {
                                        $Sql_Query = "INSERT INTO users (email, password, first_name, last_name, date_of_birth, sex, address_id, telephone_number, bank_account_number, is_pregnant) VALUES ('$email','$password','$first_name','$last_name','$date_of_birth','$sex'," . $row['address_id'] . ", '$telephone_number','$bank_account_number', '$is_pregnant')";

                                        if (mysqli_query($con, $Sql_Query)) {

                                            $MSG = 'Nastąpiło poprawne utworzenie konta';

                                            $json = json_encode($MSG);

                                            echo $json;
                                        } else {
                                            echo 'Spóbuj ponownie';
                                        }
                                    }
                                } else {
                                    echo 'Spóbuj ponownie';
                                }
                            }
                        } else {
                            if (mysqli_query($con, $Sql_Insert_Address_Query)) {
                                if ($result = mysqli_query($con, $Sql_Query_Address_Id_Get_Query)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {
                                            $Sql_Query = "INSERT INTO users (email, password, first_name, last_name, date_of_birth, sex, address_id, telephone_number, bank_account_number, is_pregnant) VALUES ('$email','$password','$first_name','$last_name','$date_of_birth','$sex'," . $row['address_id'] . ", '$telephone_number','$bank_account_number', '$is_pregnant')";

                                            if (mysqli_query($con, $Sql_Query)) {

                                                $MSG = 'Nastąpiło poprawne utworzenie konta';

                                                $json = json_encode($MSG);

                                                echo $json;
                                            } else {
                                                echo 'Spóbuj ponownie';
                                            }
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
        } else {

            $Sql_Insert_Cities_Query = "INSERT INTO cities (city_name) VALUES ('$city_name')";

            if (mysqli_query($con, $Sql_Insert_Cities_Query)) {

                if ($result = mysqli_query($con, $Sql_Query_City_Id_Get_Query)) {
                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_array($result)) {
                            $Sql_Insert_Address_Query = "INSERT INTO addresses (city_id, street_name, house_number, apartment_number) VALUES (" . $row['city_id'] . ", '$street_name', '$house_number', '$apartment_number')";
                            $Sql_Query_Address_Id_Get_Query = "SELECT * FROM addresses WHERE city_id=" . $row['city_id'] . " AND street_name='$street_name' AND house_number='$house_number' AND apartment_number='$apartment_number'";

                            $Check_Sql_Query_Address_Id_Get_Query = mysqli_fetch_array(mysqli_query($con, $Sql_Query_Address_Id_Get_Query));

                            if (isset($Check_Sql_Query_Address_Id_Get_Query)) {

                                if ($result = mysqli_query($con, $Sql_Query_Address_Id_Get_Query)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {
                                            $Sql_Query = "INSERT INTO users (email, password, first_name, last_name, date_of_birth, sex, address_id, telephone_number, bank_account_number, is_pregnant) VALUES ('$email','$password','$first_name','$last_name','$date_of_birth','$sex'," . $row['address_id'] . ", '$telephone_number','$bank_account_number', '$is_pregnant')";

                                            if (mysqli_query($con, $Sql_Query)) {

                                                $MSG = 'Nastąpiło poprawne utworzenie konta';

                                                $json = json_encode($MSG);

                                                echo $json;
                                            } else {
                                                echo 'Spóbuj ponownie';
                                            }
                                        }
                                    } else {
                                        echo 'Spóbuj ponownie';
                                    }
                                }
                            } else {
                                if (mysqli_query($con, $Sql_Insert_Address_Query)) {
                                    if ($result = mysqli_query($con, $Sql_Query_Address_Id_Get_Query)) {
                                        if (mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_array($result)) {
                                                $Sql_Query = "INSERT INTO users (email, password, first_name, last_name, date_of_birth, sex, address_id, telephone_number, bank_account_number, is_pregnant) VALUES ('$email','$password','$first_name','$last_name','$date_of_birth','$sex'," . $row['address_id'] . ", '$telephone_number','$bank_account_number', '$is_pregnant')";

                                                if (mysqli_query($con, $Sql_Query)) {

                                                    $MSG = 'Nastąpiło poprawne utworzenie konta';

                                                    $json = json_encode($MSG);

                                                    echo $json;
                                                } else {
                                                    echo 'Spóbuj ponownie';
                                                }
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
    } else if ($first_name == NULL) {

        $ReturnJsonMSG = 'Proszę wpisać poprawne imię';

        //Konwersja wiadomości do JSONa
        $ReturnJson = json_encode($ReturnJsonMSG);

        echo $ReturnJson;
    } else if ($last_name == NULL) {

        $ReturnJsonMSG = 'Proszę wpisać poprawne nazwisko';

        //Konwersja wiadomości do JSONa
        $ReturnJson = json_encode($ReturnJsonMSG);

        echo $ReturnJson;
    } else if ($password == NULL) {

        $ReturnJsonMSG = 'Proszę wpisać poprawne hasło';

        //Konwersja wiadomości do JSONa
        $ReturnJson = json_encode($ReturnJsonMSG);

        echo $ReturnJson;
    } else if ($email == NULL) {

        $ReturnJsonMSG = 'Proszę wpisać poprawny adres skrzynki pocztowej';

        //Konwersja wiadomości do JSONa
        $ReturnJson = json_encode($ReturnJsonMSG);

        echo $ReturnJson;
    } else if ($date_of_birth == "--") {

        $ReturnJsonMSG = 'Proszę wpisać poprawną datę urodzenia';

        //Konwersja wiadomości do JSONa
        $ReturnJson = json_encode($ReturnJsonMSG);

        echo $ReturnJson;
    } else if ($sex == NULL) {

        $ReturnJsonMSG = 'Proszę wybrać płeć';

        //Konwersja wiadomości do JSONa
        $ReturnJson = json_encode($ReturnJsonMSG);

        echo $ReturnJson;
    }
}
mysqli_close($con);
?>
