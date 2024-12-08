<?php 
    function checkFieldForValidate($item){
        if(isset($_POST[$item]) && !empty($_POST[$item]) && trim($_POST[$item])){
            return true;
        } else {
            return false;
        }
    }
    function checkForPassword($item){
        if(isset($_POST[$item]) && !empty($_POST[$item])){
            return true;
        } else {
            return false;
        }
    }
    function checkForSkills($item){
        if(isset($_POST['skill']) && is_array($_POST['skill'])){
            $skill = $_POST['skill'];
        } else {
            $err['skill'] = 'At least one skill is reauired.';
        }
    }
    function displayErrorMessage($err){
        $err['failed'] = 'Registration Failed.';
    }   
    function displaySuccessMessage(){
        $success['success'] = 'Registration Successful.';
    }

    function insertIntoDatabase($n, $e, $c, $a, $dob, $exp, $skl, $usr, $pas){
        try{
            $connection = new mysqli('localhost', 'root', '', 'test');
            $query = "insert into manager(fullname, email, contact, address, dob, experience, skills, username, password) values('$name', '$email', $contact, '$address', $dob, '$experience', '$skills', '$username', '$password')";
            $result = $connection->query($query);
            if($result->num_rows == 1){
                $success['success'] = 'Manager registration successful';
            } else {
                $err['failed'] = 'Manager registration failed';
            }
        } catch(Exception $ex){
            die("Error Message".$ex->getMessage());
        }
    }
?>