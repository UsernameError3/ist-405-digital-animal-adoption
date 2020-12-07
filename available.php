<?php
include('db_conn.php');
/*****************************************************************************
Title:  	Digital Animal Adoption
Use:     	Final Project
Author:  	Alex Fleming
School:  	Southern Illinois University
Term:    	Fall 2020
Developed:  11/29/20
Tested:     11/29/20
******************************************************************************/

// List all Donations
$queryAllAnimals = 'SELECT * FROM available_animals
                    ORDER BY animal_id';
$db_list_process = $db -> prepare($queryAllAnimals);
$db_list_process -> execute();
$animals = $db_list_process -> fetchAll();
$db_list_process -> closeCursor();


// Parse Adoption Header
if (isset($_POST['adopt_submit'])) {


    // Gather Form Foster Info
    $posted_fname = 'First_Name: ' . filter_input(INPUT_POST, 'First_Name');
    $posted_lname = 'Last_Name: ' . filter_input(INPUT_POST, 'Last_Name');
    $posted_city = 'City: ' . filter_input(INPUT_POST, 'City');
    $posted_state = 'State: ' . filter_input(INPUT_POST, 'State');
    $posted_phone = 'Phone: ' . filter_input(INPUT_POST, 'Phone');
    $posted_email = filter_input(INPUT_POST, 'Email');
    $posted_current_pets = 'Current_Pets: ' . filter_input(INPUT_POST, 'Current_Pets');
    $posted_abuse_check = 'Abuse_Check: ' . filter_input(INPUT_POST, 'Abuse_Check');
    $posted_residency_check = 'Residency_Check: ' . filter_input(INPUT_POST, 'Residency_Check');

    // Gather Selected Animal Info
    $posted_animal_id = filter_input(INPUT_POST, 'adopt_animal_id');
    $posted_animal_name = filter_input(INPUT_POST, 'adopt_animal_name');
    $posted_animal_color = filter_input(INPUT_POST, 'adopt_animal_color');
    $posted_animal_type = filter_input(INPUT_POST, 'adopt_animal_type');
    $posted_animal_health_issues = filter_input(INPUT_POST, 'adopt_animal_health');
    $posted_animal_neutered = filter_input(INPUT_POST, 'adopt_animal_neuter');
    $posted_animal_microchip = filter_input(INPUT_POST, 'animal_microchip');
    
    adoptionEmail($posted_fname, $posted_lname, $posted_city, $posted_state, $posted_phone, $posted_email, $posted_current_pets, $posted_abuse_check, $posted_residency_check, $posted_animal_id, $posted_animal_name, $posted_animal_color, $posted_animal_type, $posted_animal_health_issues, $posted_animal_neutered, $posted_animal_microchip);
}

// Send Adoption Email
function adoptionEmail($fname, $lname, $city, $state, $phone, $email, $current_pets, $abuse_check, $residency_check, $animal_id, $animal_name, $animal_color, $animal_type, $animal_health_issues, $animal_neutered, $animal_microchip) {

    // Get form values
    $from_address = 'digital_animal_adoption@daa.com';
    $to_address = $email;
    $subject = 'Adoption Request: ' . $animal_id;
    $message = 'fname: ' . $fname . 'lname: ' . $lname . 'city: ' . $city . 'state: ' . $state . 'phone: ' . $phone . 'email: ' . $email . 'current_pets: ' . $current_pets . 'abuse_check: ' . $abuse_check . 'residency_check: ' . $residency_check . 'animal_id: ' . $animal_id . 'animal_name: ' . $animal_name . 'animal_color: ' . $animal_color . 'animal_type: ' . $animal_type . 'animal_health_issues: ' . $animal_health_issues . 'animal_neutered: ' . $animal_neutered . 'animal_microchip: ' . $animal_microchip;

    // Bind Values to Email Fields
    $headers = "From: " . $from_address;
    $to_field = $to_address;
    $subject_field = $subject;
    $body = $message;

    $mail_result = mail($to_field,$subject_field,$body,$headers);

    if ($mail_result) {
        $response_title = 'Success';
        $response_body = 'Your email was sent successfully.';

    } else {
        $response_title = 'Failure';
        $response_body = 'Your email failed to send, please review form information.';
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Animal Adoption - Available</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="icon" type="image/png" href="images/example_cat.jpg"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <ul class="nav">
        <li class="left"><a class="nav-link" href="index.php">Home</a></li>
        <li class="right"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="right"><a class="nav-link" href="about.php">About</a></li>
        <li class="right"><a class="nav-link" href="donation.php">Donation</a></li>
        <li class="right"><a class="nav-link active" href="available.php">Adoption</a></li>
        
    </ul>
    <div class="content content-padding header-padding">
        <div class="center-content">
   
            <table>
                <tr>
                    <th>Animal Name</th>
                    <th>Animal Color</th>
                    <th>Animal Type</th>
                    <th>Animal Health Issues</th>
                    <th>Animal Neutered</th>
                    <th>Animal Microchip</th>
                    <th>&nbsp;</th>
                </tr>

                <!-- List Donations -->
                <?php foreach ($animals as $index) : ?>
                <tr>
                    <td><?php echo $index['animal_name'];?></td>
                    <td><?php echo $index['animal_color'];?></td>
                    <td><?php echo $index['animal_type'];?></td>
                    <td><?php echo $index['animal_health_issues'];?></td>
                    <td><?php echo $index['animal_neutered'];?></td>
                    <td><?php echo $index['animal_microchip'];?></td>
                    <td>
                        <!-- Send Adoption Email -->
                        <form action="donate.php" method="post">
                            <input type="hidden" name="animal_id" value="<?php echo $index['animal_id']; ?>">
                            <input type="submit" name="adopt" value="adopt">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</body>
</html>
