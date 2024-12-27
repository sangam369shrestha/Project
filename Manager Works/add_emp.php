<?php
 // PHPMailer Autoload

require realpath(dirname(__DIR__).'/Functions/functions.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Check POST data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    
    $dep_id = $_POST['dep_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Insert into database
        $stmt = $pdo->prepare("INSERT INTO employee (name, email, contact, address, dob, department_id, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $contact, $address, $dob, $dep_id, $username, password_hash($password, PASSWORD_BCRYPT)]);
        echo "Data inserted successfully";
        sendMail($name, $username, $password, $email);
    } catch (Exception $e) {
        echo "Failed to insert data: " . $e->getMessage();
    }
}
?>
