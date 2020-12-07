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
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="icon" type="image/png" href="../images/example_cat.jpg"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <ul class="nav">
        <li class="left"><a class="nav-link" href="../index.php">Home</a></li>
        <li class="right"><a class="nav-link" href="../contact.php">Contact</a></li>
        <li class="right"><a class="nav-link" href="../about.php">About</a></li>
        <li class="right"><a class="nav-link" href="../donation.php">Donation</a></li>
        <li class="right"><a class="nav-link active" href="../available.php">Adoption</a></li>
        
    </ul>
    <div class="content content-padding header-padding">
        <div class="center-content">
    
            <form class="large" action="../available.php" method="post" >

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

                <br>
                <input type="submit" class="button" name="Adopt" value="Submit Application" /><br>

            </form>
        </div>    
    </div>
</body>
</html>
