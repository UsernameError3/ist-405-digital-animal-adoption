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

// Edit Donation
if ( isset($_POST['edit']) ) {
    $donation_id = filter_input(INPUT_POST, 'donation_id', FILTER_VALIDATE_INT);

    // List existing information by 'donation_id'
    $queryDonation = 'SELECT * FROM donation_queue
                      WHERE donation_id = :donation_id';

    $db_list_process = $db->prepare($queryDonation);
    $db_list_process->bindValue(':donation_id', $donation_id);
    $db_list_process->execute();
    $donation = $db_list_process->fetch();
    $db_list_process->closeCursor();

    $donation_animal_health = $donation['animal_health_issues'];
    if ($donation_animal_health != '1' || $donation_animal_health != 1 || $donation_animal_health != true) {
        $checkboxHealth = '';
    } else {
        $checkboxHealth = 'checked';
    }

    $donation_animal_neuter = $donation['animal_neutered'];
    if ($donation_animal_neuter != '1' || $donation_animal_neuter != 1 || $donation_animal_neuter != true) {
        $checkboxNeuter = '';
    } else {
        $checkboxNeuter = 'checked';
    }

    $donation_animal_microchip = $donation['animal_microchip'];
    if ($donation_animal_microchip != '1' || $donation_animal_microchip != 1 || $donation_animal_microchip != true) {
        $checkboxMicrochip = '';
    } else {
        $checkboxMicrochip = 'checked';
    }

    $form = '
        <form class="large" action="donation.php" method="post" >

            <input type="hidden" name="donation_id" value="' . $donation['donation_id'] . '"><br>

            <label>Animal Name:</label>
            <input type="text" name="animal_name" value="' . $donation['animal_name'] . '"><br>

            <label>Animal Color:</label>
            <input type="text" name="animal_color" value="' . $donation['animal_color'] . '"><br>

            <label>Animal Type:</label>
            <input type="text" name="animal_type" value="' . $donation['animal_type'] . '"><br>

            <br>
            <p class="red">Pet Health Check:</p>

            <label>Existing Health Issues:</label>
            <input type="checkbox" name="animal_health_issues" value="TRUE" '. $checkboxHealth .'><br>
            
            <label>Spayed/Neutered:</label>
            <input type="checkbox" name="animal_neutered" value="TRUE" '. $checkboxNeuter .'><br>

            <label>Microchipped?:</label>
            <input type="checkbox" name="animal_microchip" value="TRUE" '. $checkboxMicrochip .'><br>

            <br>
            <p class="red">Contact Information:</p>

            <label>Phone Number:</label>
            <input type="text" name="phone" value="' . $donation['phone'] . '"><br>

            <label>Email:</label>
            <input type="text" name="email" value="' . $donation['email'] . '"><br>

            <br>
            <input type="submit" class="button" name="edited" value="Submit Application" /><br>

        </form>
    ';

} else {

    $form = '
        <form class="large" action="donation.php" method="post" >

            <label>Animal Name:</label>
            <input type="text" name="animal_name" value=""><br>

            <label>Animal Color:</label>
            <input type="text" name="animal_color" value=""><br>

            <label>Animal Type:</label>
            <input type="text" name="animal_type" value=""><br>

            <br>
            <p class="red">Pet Health Check:</p>

            <label>Existing Health Issues:</label>
            <input type="checkbox" name="animal_health_issues" value="TRUE"><br>
            
            <label>Spayed/Neutered:</label>
            <input type="checkbox" name="animal_neutered" value="TRUE"><br>

            <label>Microchipped?:</label>
            <input type="checkbox" name="animal_microchip" value="TRUE"><br>

            <br>
            <p class="red">Contact Information:</p>

            <label>Phone Number:</label>
            <input type="text" name="phone" value=""><br>

            <label>Email:</label>
            <input type="text" name="email" value=""><br>

            <br>
            <input type="submit" class="button" name="donate" value="Submit Application" /><br>

        </form>
    ';


}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Animal Adoption - Donate</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="icon" type="image/png" href="images/example_cat.jpg"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <ul class="nav">
        <li class="left"><a class="nav-link" href="index.php">Home</a></li>
        <li class="right"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="right"><a class="nav-link" href="about.php">About</a></li>
        <li class="right"><a class="nav-link active" href="donation.php">Donation</a></li>
        <li class="right"><a class="nav-link" href="available.php">Adoption</a></li>
        
    </ul>
    <div class="content content-padding header-padding">
        <div class="center-content">
            <?php echo $form;?>
        </div>    
    </div>
</body>
</html>
