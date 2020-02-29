<?php
$conn = mysqli_connect('localhost', 'root', '', 'dietary');
if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
}

if (isset($_POST['updatePatientBtn'])) {
    $pId = $_POST['pId'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $ward = $_POST['ward'];

    $sql = "UPDATE patient SET 
      lastName='{$lastName}', 
      firstName='{$firstName}', 
      middleName='{$middleName}', 
      dateOfBirth='{$dateOfBirth}', 
      ward='{$ward}' 
      WHERE uId='$pId'";
    if (mysqli_query($conn, $sql)) {
        echo '
      <div class="card-body" id="patientInfo">
        <form method="post">
            <div class="row">
                <input type="hidden" class="form-control" name="pId" id="pId" value="' . $pId . '">
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="lastName" id="lastName" value="' . $lastName . '">
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" name="firstName" id="firstName" value="' . $firstName . '">
                        </div>
                    </div>
                    <div class="col-md-4 pl-1">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" placeholder="Middle Name" name="middleName" id="middleName" value="' . $middleName . '">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" placeholder="Date of Birth" name="dateOfBirth" id="dateOfBirth" value="' . $dateOfBirth . '">
                        </div>
                    </div>
                    <div class="col-md-6 pl-1">
                        <div class="form-group">
                            <label>Ward</label>
                            <select id="ward" name="ward" class="form-control">
                                <option value="' . $ward . '">' . $ward . '</option>
                                <option value="General">General</option>
                                <option value="Pedia/Surgery">Pedia/Surgery</option>
                                <option value="OB">OB</option>
                                <option value="Rehy/ISO">Rehy/ISO</option>
                            </select>
                        </div>
                    </div>
                </div>
        
                <button type="submit" name="updatePatientBtn" class="btn btn-info btn-fill pull-right">Update Patient Info</button>
                <div class="clearfix"></div>
        </form>
      </div>
      ';
        header('Location: searchList.php?uId=' . $pId . '&status=newUpdate');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    exit();
}
//Generate Reports Btn
// if (isset($_POST['generateReportBtn'])) {
//     $pId = $_POST['pId'];
//     $Breakfast = $_POST['Breakfast'];
//     $Lunch = $_POST['Lunch'];
//     $Dinner = $_POST['Dinner'];
//     $sessionDate = $_POST['sessionDate'];

//     $sql = "SELECT * FROM patientsubsistence WHERE date='$sessionDate'";
//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) > 0) {

//         $sql2 = "UPDATE patientsubsistence SET 
//         breakfast='{$Breakfast}', 
//         lunch='{$Lunch}', 
//         dinner='{$Dinner}'
//         WHERE date='$sessionDate'";
//         if (mysqli_query($conn, $sql2)) {
//             header('Location: searchList.php?uId=' . $pId . '&addSession=1');
//         }
//     } else {
//         $sql = "INSERT INTO patientSubsistence (pId, breakfast, lunch, dinner, date) VALUES ('$pId', '$Breakfast', '$Lunch', '$Dinner', '$sessionDate')";
//         if (mysqli_query($conn, $sql)) {
//             header('Location: searchList.php?uId=' . $pId . '');
//         } else {
//             echo "Error: " . mysqli_error($conn);
//         }
//         exit();
//     }
// }


//================================ Search List ================================
// Add Session
if (isset($_POST['addSessionBtn'])) {
    $pId = $_POST['pId'];
    $Breakfast = $_POST['Breakfast'];
    $Lunch = $_POST['Lunch'];
    $Dinner = $_POST['Dinner'];
    $sessionDate = $_POST['sessionDate'];
    $todayDate = substr($sessionDate, 8, 2);


    $sql = "SELECT * FROM patientsubsistence WHERE date='$sessionDate' AND pId = '$pId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $breakfast = $row['breakfast'];
            $lunch = $row['lunch'];
            $dinner = $row['dinner'];

            if ($breakfast == 'on' && $lunch == 'on' && $dinner == 'on') {
                switch ($todayDate) {
                    case '01':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '02':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '03':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '04':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '05':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '06':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '07':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '08':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '09':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '10':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '11':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '12':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '13':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '14':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '15':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '16':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '17':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '18':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '19':
                        $sql2 = "UPDATE patientsubsistence SET 
                                    breakfast='{$Breakfast}', 
                                    lunch='{$Lunch}', 
                                    dinner='{$Dinner}'
                                    WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '20':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '21':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '22':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '23':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '24':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '25':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '26':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '27':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '28':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '29':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '30':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '31':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    default:
                        echo "Something went wrong!";
                }
            } else if ($breakfast == 'on' && $lunch == 'on') {
                switch ($todayDate) {
                    case '01':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '02':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '03':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '04':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '05':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '06':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '07':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '08':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '09':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '10':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '11':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '12':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '13':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '14':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '15':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '16':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '17':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '18':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '19':
                        $sql2 = "UPDATE patientsubsistence SET 
                                    breakfast='{$Breakfast}', 
                                    lunch='{$Lunch}', 
                                    dinner='{$Dinner}'
                                    WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '20':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '21':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '22':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '23':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '24':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '25':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '26':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '27':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '28':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '29':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '30':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '31':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    default:
                        echo "Something went wrong!";
                }
            } else if ($breakfast == 'on' && $dinner == 'on') {
                switch ($todayDate) {
                    case '01':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '02':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '03':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '04':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '05':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '06':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '07':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '08':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '09':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '10':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '11':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '12':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '13':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '14':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '15':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '16':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '17':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '18':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '19':
                        $sql2 = "UPDATE patientsubsistence SET 
                                    breakfast='{$Breakfast}', 
                                    lunch='{$Lunch}', 
                                    dinner='{$Dinner}'
                                    WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '20':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '21':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '22':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '23':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '24':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '25':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '26':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '27':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '28':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '29':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '30':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '31':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    default:
                        echo "Something went wrong!";
                }
            } else if ($breakfast == 'on') {
                switch ($todayDate) {
                    case '01':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '02':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '03':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '04':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '05':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '06':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '07':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '08':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '09':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '10':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '11':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '12':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '13':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '14':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '15':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '16':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '17':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '18':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '19':
                        $sql2 = "UPDATE patientsubsistence SET 
                                    breakfast='{$Breakfast}', 
                                    lunch='{$Lunch}', 
                                    dinner='{$Dinner}'
                                    WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '20':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '21':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '22':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '23':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '24':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '25':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '26':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '27':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '28':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '29':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '30':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '31':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    default:
                        echo "Something went wrong!";
                }
            } else {
                switch ($todayDate) {
                    case '01':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '02':
                        $sql2 = "UPDATE patientsubsistence SET 
                            breakfast='{$Breakfast}', 
                            lunch='{$Lunch}', 
                            dinner='{$Dinner}'
                            WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '03':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '04':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '05':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '06':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '07':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '08':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '09':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '10':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '11':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '12':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '13':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '14':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '15':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '16':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '17':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '18':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '19':
                        $sql2 = "UPDATE patientsubsistence SET 
                                    breakfast='{$Breakfast}', 
                                    lunch='{$Lunch}', 
                                    dinner='{$Dinner}'
                                    WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '20':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '21':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '22':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '23':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '24':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '25':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '26':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '27':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '28':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '29':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '30':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    case '31':
                        $sql2 = "UPDATE patientsubsistence SET 
                                breakfast='{$Breakfast}', 
                                lunch='{$Lunch}', 
                                dinner='{$Dinner}'
                                WHERE date='$sessionDate' AND pId = '$pId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                        break;
                    default:
                        echo "Something went wrong!";
                }
            }
        }
    } else {
        $sql = "INSERT INTO patientsubsistence (pId, breakfast, lunch, dinner, date) VALUES ('$pId', '$Breakfast', '$Lunch', '$Dinner', '$sessionDate')";
        if (mysqli_query($conn, $sql)) {
            header('Location: searchList.php?uId=' . $pId . '');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        exit();
    }
}

if (isset($_GET['updateSession'])) {
    $pId = $_GET['uId'];
    $sql = "SELECT * FROM patientsubsistence";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $breakfast = $row['breakfast'];
            $lunch = $row['lunch'];
            $dinner = $row['dinner'];
            $rpId = $row['pId'];
            $sessionDate = $row['date'];
            $getTodayDate = substr($sessionDate, 8, 2);
            $todayDate = 'day' . $getTodayDate;
            $listOfDayArray = array("day01", "day02", "day03", "day04", "day05", "day06", "day07", "day08", "day09", "day10", "day11", "day12", "day13", "day14", "day15", "day16", "day17", "day18", "day19", "day20", "day21", "day22", "day23", "day24", "day25", "day26", "day27", "day28", "day29", "day30", "day31");
            // Loop listOfDayArray
            for ($listOfDay = 0; count($listOfDayArray) >= $listOfDay; $listOfDay++) {

                //Breakfast Lunch Dinner
                if ($breakfast == 'on' && $lunch == 'on' && $dinner == 'on') {
                    if ($listOfDayArray[$listOfDay] == $todayDate) {
                        $sql2 = "UPDATE patient SET $todayDate = 'bld' WHERE uId = '$rpId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                    }
                }
                //Breakfast Lunch 
                else if ($breakfast == 'on' && $lunch == 'on') {
                    if ($listOfDayArray[$listOfDay] == $todayDate) {
                        $sql2 = "UPDATE patient SET $todayDate = 'bl' WHERE uId = '$rpId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                    }
                }
                //Breakfast Dinner
                else if ($breakfast == 'on' && $dinner == 'on') {
                    if ($listOfDayArray[$listOfDay] == $todayDate) {
                        $sql2 = "UPDATE patient SET $todayDate = 'bd' WHERE uId = '$rpId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                    }
                }
                //Dinner Lunch
                else if ($dinner == 'on' && $lunch == 'on') {
                    if ($listOfDayArray[$listOfDay] == $todayDate) {
                        $sql2 = "UPDATE patient SET $todayDate = 'dl' WHERE uId = '$rpId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                    }
                }
                //Breakfast
                else if ($breakfast == 'on') {
                    if ($listOfDayArray[$listOfDay] == $todayDate) {
                        $sql2 = "UPDATE patient SET $todayDate = 'b' WHERE uId = '$rpId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                    }
                }
                //Lunch
                else if ($lunch == 'on') {
                    if ($listOfDayArray[$listOfDay] == $todayDate) {
                        $sql2 = "UPDATE patient SET $todayDate = 'l' WHERE uId = '$rpId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                    }
                }
                //Dinner
                else if ($dinner == 'on') {
                    if ($listOfDayArray[$listOfDay] == $todayDate) {
                        $sql2 = "UPDATE patient SET $todayDate = 'd' WHERE uId = '$rpId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                    }
                }
                //Default
                else {
                    if ($listOfDayArray[$listOfDay] == $todayDate) {
                        $sql2 = "UPDATE patient SET $todayDate = NULL WHERE uId = '$rpId'";
                        if (mysqli_query($conn, $sql2)) {
                            header('Location: searchList.php?uId=' . $pId . '&addSession=' . $sessionDate . '');
                        }
                    }
                }
            }
        }
    }
}
