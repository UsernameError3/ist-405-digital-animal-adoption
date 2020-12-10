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

if ( isset($_POST['adopt']) ) {
    $animal_id = filter_input(INPUT_POST, 'animal_id', FILTER_VALIDATE_INT);

    // List existing information by 'donation_id'
    $queryAnimals = 'SELECT * FROM available_animals
                     WHERE animal_id = :animal_id';

    $db_list_process = $db->prepare($queryAnimals);
    $db_list_process->bindValue(':animal_id', $animal_id);
    $db_list_process->execute();
    $animal = $db_list_process->fetch();
    $db_list_process->closeCursor();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Animal Adoption - Adopt</title>
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
            
            <form class="large" action="available.php" method="post" >

                <label>First Name:</label>
                <input type="text" name="First_Name" value=""><br>

                <label>Last Name:</label>
                <input type="text" name="Last_Name" value=""><br>

                <label>City:</label>
                <input type="text" name="City" value=""><br>
                
                <label>State:</label>
                <input type="text" name="State" value=""><br>
                
                <label>Phone Number:</label>
                <input type="text" name="Phone" value=""><br>

                <label>Email:</label>
                <input type="text" name="Email" value=""><br>

                <label>Number of Existing Pets:</label>
                <input type="text" name="Current_Pets" value=""><br>

                <br>
                <p class="red">Pet Saftey Check:</p>
            
                <label>Any Record / History of Animal Abuse?</label>
                <input type="checkbox" name="Abuse_Check" value=""><br>

                <label>Residency Allows Pets?</label>
                <input type="checkbox" name="Residency_Check" value=""><br>

                <input type="hidden" value="Animal ID: <?php echo $animal['animal_id'];?>" name="adopt_animal_id"><br>
                <input type="hidden" value="Animal Name: <?php echo $animal['animal_name'];?>" name="adopt_animal_name"><br>
                <input type="hidden" value="Animal Color: <?php echo $animal['animal_color'];?>" name="adopt_animal_color"><br>
                <input type="hidden" value="Animal Type: <?php echo $animal['animal_type'];?>" name="adopt_animal_type"><br>
                <input type="hidden" value="Animal Health: <?php echo $animal['animal_health_issues'];?>" name="adopt_animal_health"><br>
                <input type="hidden" value="Animal Neuter: <?php echo $animal['animal_neutered'];?>" name="adopt_animal_neuter"><br>
                <input type="hidden" value="Animal Microchip: <?php echo $animal['animal_microchip'];?>" name="animal_microchip"><br>

                <br>
                <label>On Submission of Form, Your Information and Selected Animal will be emailed to: digital_animal_adoption@daa.com</label>
                <input type="submit" class="button" name="adopt_submit" value="Submit Application" /><br>

            </form>
        </div>    
    </div>
</body>
</html>


