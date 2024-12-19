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
            $connection = new mysqli('localhost', 'root', '', 'project_task_management_system');
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
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";  // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array();  // Initialize the response array to store messages

// Check if form data is set
if (isset($_POST['name'], $_POST['email'], $_POST['contact'], $_POST['gender'], $_POST['username'], $_POST['password'])) {
    // Sanitize input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash the password

    // Server-side validation
    if (empty($name) || empty($email) || empty($contact) || empty($gender) || empty($username) || empty($password)) {
        $response['error'] = "All fields are required.";  // Store error message
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['error'] = "Invalid email format.";  // Store error message
    } elseif (!preg_match("/^[0-9]{10}$/", $contact)) {
        $response['error'] = "Invalid contact number. It should be 10 digits.";  // Store error message
    } else {
        // Insert data into MySQL database
        $sql = "INSERT INTO users (name, email, contact, gender, username, password) 
                VALUES ('$name', '$email', '$contact', '$gender', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            $response['success'] = "Data submitted successfully!";  // Store success message
        } else {
            $response['error'] = "Error: " . $conn->error;  // Store error message if insertion fails
        }
    }

    $conn->close();
} else {
    $response['error'] = "No data received.";  // Store error message if no data is received
}

// Return response as JSON
echo json_encode($response);
?>
