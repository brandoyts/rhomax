<?php

include_once "./database.php";

if(isset($_POST["submit-btn"])) {
    $required_fields = array("fname", "lname", "email",
                              "contact", "time-to-call", "lot-area",
                              "length", "width", "floor-area",
                              "floor-level", "budget", "date");

    // check if there is an image to upload
    if(isset($_FILES["img"])) {
        $errors = array();
        $extensions= array("jpeg","jpg","png");

        $file_name = $_FILES['img']['name'];
        $file_size =$_FILES['img']['size'];
        $file_tmp =$_FILES['img']['tmp_name'];
        $file_type=$_FILES['img']['type'];

        if($file_size > 5097152){
            $errors[] = "file size error";
        }

        if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../uploads/".$file_name);
        }

    }

    // validate fields
    foreach($required_fields as $field) {
        if(!isset($_POST[$field])) {
            header("location: ../estimate.php?submit=failed");
            exit();
        }
    }

    echo $_POST["floor-level"];

    // insert to client table
    $stmt1 = $dbh->prepare("INSERT INTO client (first_name, last_name, email, contact_number, best_time_to_call)
                           VALUES (:first_name, :last_name, :email, :contact_number, :best_time_to_call)");

    $stmt1->bindParam(":first_name", $_POST["fname"]);
    $stmt1->bindParam(":last_name", $_POST["lname"]);
    $stmt1->bindParam(":email", $_POST["email"]);
    $stmt1->bindParam(":contact_number", $_POST["contact"]);
    $stmt1->bindParam(":best_time_to_call", $_POST["time-to-call"]);
    $stmt1->execute();

    // get last inserted id from client table
    $stmt1 = $dbh->query("SELECT LAST_INSERT_ID() from client");
    $client_id = $stmt1->fetchColumn();

    // insert to desired specification table
    $stmt2 = $dbh->prepare("INSERT INTO desired_specification (client_id, floor_area, floor_level, number_of_rooms, number_of_toilets, car_garage, preffered_design, preffered_finish, others)
                           VALUES (:client_id, :floor_area, :floor_level, :number_of_rooms, :number_of_toilets, :car_garage, :preffered_design, :preffered_finish, :others)");

    $stmt2->bindParam(":client_id", $client_id);
    $stmt2->bindParam(":floor_area", $_POST["floor-area"]);
    $stmt2->bindParam(":floor_level", $_POST["floor-level"]);
    $stmt2->bindParam(":number_of_rooms", $_POST["number-of-rooms"]);
    $stmt2->bindParam(":number_of_toilets", $_POST["number-of-toilets"]);
    $stmt2->bindParam(":car_garage", $_POST["garage"]);
    $stmt2->bindParam(":preffered_design", $_POST["design"]);
    $stmt2->bindParam(":preffered_finish", $_POST["finish"]);
    $stmt2->bindParam(":others", $_POST["others"]);
    $stmt2->execute();

    // insert to property information table
    $stmt3 = $dbh->prepare("INSERT INTO property_information (client_id, lot_area, length, width, location_of_property, img)
                            VALUES (:client_id, :lot_area, :length, :width, :location_of_property, :img)");

    $stmt3->bindParam(":client_id", $client_id);
    $stmt3->bindParam(":lot_area", $_POST["lot-area"]);
    $stmt3->bindParam(":length", $_POST["length"]);
    $stmt3->bindParam(":width", $_POST["width"]);
    $stmt3->bindParam(":location_of_property", $_POST["location-of-property"]);
    $stmt3->bindParam(":img", $_POST["img"]);
    $stmt3->execute();

    // insert to payment_and_construction table
    $stmt3 = $dbh->prepare("INSERT INTO payment_and_construction (client_id, budget, payment_scheme, construction_date)
                            VALUES (:client_id, :budget, :payment_scheme, :construction_date)");

    $stmt3->bindParam(":client_id", $client_id);
    $stmt3->bindParam(":budget", $_POST["budget"]);
    $stmt3->bindParam(":payment_scheme", $_POST["scheme"]);
    $stmt3->bindParam(":construction_date", $_POST["date"]);
    $stmt3->execute();

    header("location: ../success.php");
    exit();
}
