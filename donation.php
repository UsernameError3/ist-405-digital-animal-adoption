<?php
include('functions/db_conn.php');
/*****************************************************************************
Title:  	Digital Animal Adoption
Use:     	Final Project
Author:  	Alex Fleming
School:  	Southern Illinois University
Term:    	Fall 2020
Developed:  11/29/20
Tested:     11/29/20
******************************************************************************/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// List all Donations
$queryAllDonations = 'SELECT * FROM donation_queue 
                      ORDER BY donation_id';
$db_list_process = $db -> prepare($queryAllDonations);
$db_list_process -> execute();
$donations = $db_list_process -> fetchAll();
$db_list_process -> closeCursor();


//Parse Add Donation Header
if (isset($_POST['donate'])) {

    // Get the New Donation form data
    $posted_animal_name = filter_input(INPUT_POST, 'animal_name');
    $posted_animal_color = filter_input(INPUT_POST, 'animal_color');
    $posted_animal_type = filter_input(INPUT_POST, 'animal_type');
    $posted_animal_health_issues = filter_input(INPUT_POST, 'animal_health_issues');
    $posted_animal_neutered = filter_input(INPUT_POST, 'animal_neutered');
    $posted_animal_microchip = filter_input(INPUT_POST, 'animal_microchip');
    $posted_phone = filter_input(INPUT_POST, 'phone');
    $posted_email = filter_input(INPUT_POST, 'email');

    addDonation($posted_animal_name, $posted_animal_color, $posted_animal_type, $posted_animal_health_issues, $posted_animal_neutered, $posted_animal_microchip, $posted_phone, $posted_email);
}

// Parse Edit Donation Header
if ( isset($_POST['edited']) ) {

    // Get the Edited Donation form data
    $posted_donation_id = filter_input(INPUT_POST, 'donation_id', FILTER_VALIDATE_INT);
    $posted_animal_name = filter_input(INPUT_POST, 'animal_name');
    $posted_animal_color = filter_input(INPUT_POST, 'animal_color');
    $posted_animal_type = filter_input(INPUT_POST, 'animal_type');
    $posted_animal_health_issues = filter_input(INPUT_POST, 'animal_health_issues');
    $posted_animal_neutered = filter_input(INPUT_POST, 'animal_neutered');
    $posted_animal_microchip = filter_input(INPUT_POST, 'animal_microchip');
    $posted_phone = filter_input(INPUT_POST, 'phone');
    $posted_email = filter_input(INPUT_POST, 'email');

    updateDonation($posted_donation_id, $posted_animal_name, $posted_animal_color, $posted_animal_type, $posted_animal_health_issues, $posted_animal_neutered, $posted_animal_microchip, $posted_phone, $posted_email);

}

// Parse Delete Donation Header
if ( isset($_POST['delete']) ) {
    $posted_donation_id = filter_input(INPUT_POST, 'donation_id', FILTER_VALIDATE_INT);
    deleteDonation($posted_donation_id);
}


// Execute Database Insert
function addDonation($animal_name, $animal_color, $animal_type, $animal_health_issues, $animal_neutered, $animal_microchip, $phone, $email) {

    // Validate inputs
    if ($donation_id == null || $donation_id == false ||
        $animal_name == null || $animal_name == false ||
        $animal_color == null || $animal_color == false ||
        $animal_type == null || $animal_type == false ||
        $animal_health_issues == null || $animal_health_issues == false ||
        $animal_neutered == null || $animal_neutered == false ||
        $animal_microchip == null || $animal_microchip == false ||
        $phone == null || $phone == false ||
        $email == null || $email == false) {
            $error_message = "Invalid animal data. Check all fields and try again.";
            include('db_error.php');

    } else {
        include('functions/db_conn.php');

        // Add Animal to the database  
        $queryAddDonation = 'INSERT INTO donation_queue (animal_name, animal_color, animal_type, animal_health_issues, animal_neutered, animal_microchip, phone, email)
                             VALUES (:animal_name, :animal_color, :animal_type, :animal_health_issues, :animal_neutered, :animal_microchip, :phone, :email)';

        $db_add_process = $db->prepare($queryAddDonation);
        $db_add_process->bindValue(':animal_name', $animal_name);
        $db_add_process->bindValue(':animal_color', $animal_color);
        $db_add_process->bindValue(':animal_type', $animal_type);
        $db_add_process->bindValue(':animal_health_issues', $animal_health_issues);
        $db_add_process->bindValue(':animal_neutered', $animal_neutered);
        $db_add_process->bindValue(':animal_microchip', $animal_microchip);
        $db_add_process->bindValue(':phone', $phone);
        $db_add_process->bindValue(':email', $email);
        // $db_add_process->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db_add_process->execute();
        $db_add_process->closeCursor();
        
        header('Location: donation.php');
    }

}

// Execute Database Update
function updateDonation($donation_id, $animal_name, $animal_color, $animal_type, $animal_health_issues, $animal_neutered, $animal_microchip, $phone, $email) {

    
    // Validate inputs
    if ($donation_id == null || $donation_id == false ||
        $animal_name == null || $animal_name == false ||
        $animal_color == null || $animal_color == false ||
        $animal_type == null || $animal_type == false ||
        $animal_health_issues == null || $animal_health_issues == false ||
        $animal_neutered == null || $animal_neutered == false ||
        $animal_microchip == null || $animal_microchip == false ||
        $phone == null || $phone == false ||
        $email == null || $email == false) {
            $error_message = "Invalid animal data. Check all fields and try again.";
            include('db_error.php');

    } else {
        include('functions/db_conn.php');
        // Add Donation to the database  
        $queryEditDonation = 'UPDATE donation_queue 
                              SET
                              animal_name = :animal_name,
                              animal_color = :animal_color,
                              animal_type = :animal_type,
                              animal_health_issues = :animal_health_issues,
                              animal_neutered = :animal_neutered,
                              animal_microchip = :animal_microchip,
                              phone = :phone,
                              email = :email
                              WHERE
                              donation_id = :donation_id;';

        $db_edit_process = $db->prepare($queryEditDonation);
        $db_edit_process->bindValue(':donation_id', $donation_id);
        $db_edit_process->bindValue(':animal_name', $animal_name);
        $db_edit_process->bindValue(':animal_color', $animal_color);
        $db_edit_process->bindValue(':animal_type', $animal_type);
        $db_edit_process->bindValue(':animal_health_issues', $animal_health_issues);
        $db_edit_process->bindValue(':animal_neutered', $animal_neutered);
        $db_edit_process->bindValue(':animal_microchip', $animal_microchip);
        $db_edit_process->bindValue(':phone', $phone);
        $db_edit_process->bindValue(':email', $email);

        
        $success = $db_edit_process->execute();
        $db_edit_process->closeCursor();

        // Reload the Page
        header('Location: donation.php');
    }

}

// Execute Database Delete
function deleteDonation($donation_id) {

    // Validate inputs
    if ($donation_id == null || $donation_id == false) {
            $error_message = "Invalid donation data. Check all fields and try again.";
            include('db_error.php');

    } else {
        include('functions/db_conn.php');

        $queryDeleteDonation = 'DELETE FROM donation_queue
                                WHERE donation_id = :donation_id';

        $db_delete_process = $db->prepare($queryDeleteDonation);
        $db_delete_process->bindValue(':donation_id', $donation_id);
        $success = $db_delete_process->execute();
        $db_delete_process->closeCursor();

        // Reload the Page
        header('Location: donation.php');
    }

}





?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Animal Adoption - Donations</title>
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
  
            <a class="button" href="donate.php">Donate</a>

            <table>
                <tr>
                    <th>Animal Name</th>
                    <th>Animal Color</th>
                    <th>Animal Type</th>
                    <th>Animal Health Issues</th>
                    <th>Animal Neutered</th>
                    <th>Animal Microchip</th>
                    <th>Contact Phone</th>
                    <th>Contact Email</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <!-- List Donations -->
                <?php foreach ($donations as $index) : ?>
                <tr>
                    <td><?php echo $index['animal_name'];?></td>
                    <td><?php echo $index['animal_color'];?></td>
                    <td><?php echo $index['animal_type'];?></td>
                    <td><?php echo $index['animal_health_issues'];?></td>
                    <td><?php echo $index['animal_neutered'];?></td>
                    <td><?php echo $index['animal_microchip'];?></td>
                    <td><?php echo $index['phone'];?></td>
                    <td><?php echo $index['email'];?></td>
                    <td>
                        <!-- Delete Donation -->
                        <form action="donation.php" method="post">
                            <input type="hidden" name="donation_id" value="<?php echo $index['donation_id']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                    <td>
                        <!-- Edit Donation -->
                        <form action="donate.php" method="post">
                            <input type="hidden" name="donation_id" value="<?php echo $index['donation_id']; ?>">
                            <input type="submit" name="edit" value="Edit">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</body>
</html>
