<?php
require_once('database-conn.php');
$db = $conn; //updating connection string
$register=$valid=$fnameErr=$lnameErr=$emailErr=$passErr=$cpassErr='';
$set_fistName=$set_lastName=$set_email='';

extract($_POST);
if(isset($_POST['submit']))
{
    //validating input
    $validName = "/^[a-zA-Z ]*$/";
    $validEmail = "";
    $uppercasePassword = "";
    $lowercasePassword = "";
    $digitPassword = "";
    $spacesPassword = "";
    $symbolPassword = "";
    $minEightPassword = "";

    //validating first name
    if(empty("$first_name")){
        $fnameErr = "first name is required";
    }else if(!preg_match($validName, $first_name)){
        $fnameErr = "invalid input";
    }else{
        $fnamErr = true;
    }

    //last name
    if(empty("$last_name")){
        $lnameErr = "last name is required";
    }else if(!preg_match($validName, $last_name)){
        $lnameErr = "invalid input";
    }else{
        $lnameErr = true;
    }

    //email
    if(empty("$email")){
        $emailErr = "email is required";
    }else if(!preg_match($validName, $email)){
        $emailErr = "invalid input";
    }else{
        $emailErr = true;
    }

    //password validation
    if(empty("$password")){
        $passErr = "password is required";
    }else if(!preg_Match($uppercasePassword, $password) || !preg_match($lowercasePassword, $password) || !preg_match($digitPassword, $password) || !preg_match($symbolPassword, $password) || !preg_match($minEightPassword, $password) || !preg_match($spacesPassword, $password)){
        $passErr = "Password must contain 8 or more uppercase, lowercase characters, a number and a special character with no spaces";
    }
    else{
        $passErr = true;
    }

    //confirm password validation
    if($cpassword != $password){
        $cpassErr = "Passwords do not match";
    }
    else{
        $cpassErr = true;
    }

    //validate all the fields
    if($fnameErr == 1 && $lnameErr == 1 && $emailErr == 1 && $passErr == 1 && $cpassErr == 1)
    {
        $first_name = valid_input($first_name);
        $last_name = valid_input($last_name);
        $email = valid_input($email);
        $password = valid_input(md5($password));

        //check for unique email
        $checkEmail = unique_email($email);
        if($checkEmail)
        {
            $register = $email. "already exists";
        }else{
            //Insert data
            $register = register($firstName, $lastName, $email, $password);
        }
    }else{
        //
        $set_firstName = $first_name;
        $set_lastName = $last_name;
        $set_email = $email;
    }
}

//
function valid_input($email){
    global $db;
    $sql = "SELECT email FROM users WHERE email = '" .$email. ".";
    $check = $db->query($sql);

    if($check->num_rows > 0){
        return true;
    }else{
        return false;
    }
}

//function for inserting data into database
function register($fistName, $lastName, $email, $password){
    global $db;
    $sql = "INSERT INTO users(first_name, last_name, email, password) VALUE(?,?,?,?)";
    $query = $db->prepare($sql);
    $query->bind_param('ssss', $firstName, $lastName, $email, $password);
    $exec = $query->execute();

    if($exec == true){
        return "User registered successfully";
    }else
    {
        return "Error: " . $sql . "<br>" .$db->error;
    }
}
?>