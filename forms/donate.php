<?php

/*****************************************************************************
Title:  	Digital Animal Adoption
Use:     	Final Project
Author:  	Alex Fleming
School:  	Southern Illinois University
Term:    	Fall 2020
Developed:  11/29/20
Tested:     11/29/20
******************************************************************************/

?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Animal Adoption</title>
    <link rel="stylesheet" type="text/css" href="../ist-405-digital-animal-adoption/css/main.css" />
    <link rel="icon" type="image/png" href="images/example_cat.jpg"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <ul class="nav">
        <li class="left"><a class="nav-link" href="../ist-405-digital-animal-adoption/index.php">Home</a></li>
        <li class="right"><a class="nav-link" href="../ist-405-digital-animal-adoption/contact.php">Contact</a></li>
        <li class="right"><a class="nav-link" href="../ist-405-digital-animal-adoption/about.php">About</a></li>
        <li class="right"><a class="nav-link active" href="../ist-405-digital-animal-adoption/donation.php">Donation</a></li>
        <li class="right"><a class="nav-link" href="../ist-405-digital-animal-adoption/available.php">Adoption</a></li>
        
    </ul>
    <div class="content content-padding header-padding">
        <div class="center-content">
    
            <form class="large" action="../ist-405-digital-animal-adoption/donation.php" method="post" >

                <label>Animal Name:</label>
                <input type="text" name="Animal_Name" value=""><br>

                <label>Animal Color:</label>
                <input type="text" name="Animal_Color" value=""><br>

                <label>Animal Type:</label>
                <select name="Animal_Type" id="Animal_Type_List">
                    <option value="">Choose Animal Type</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                </select><br>
         
                <br>
                <p class="red">Pet Health Check:</p>

                <label>Existing Health Issues:</label>
                <input type="checkbox" name="Health_Check" value=""><br>
                
                <label>Spayed/Neutered:</label>
                <input type="checkbox" name="Neuter_Check" value=""><br>

                <label>Microchipped?:</label>
                <input type="checkbox" name="Microchip_Check" value=""><br>

                <br>
                <p class="red">Contact Information:</p>

                <label>Name:</label>
                <input type="text" name="Name" value=""><br>

                <label>Email:</label>
                <input type="text" name="Email" value=""><br>

                <label>Phone Number:</label>
                <input type="text" name="Phone" value=""><br>

                <br>
                <input type="submit" class="button" name="donate" value="Submit Application" /><br>

            </form>
        </div>    
    </div>
</body>
</html>
