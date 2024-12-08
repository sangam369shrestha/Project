<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode([
        'status' => 'error',
        'messages' => ['Database connection failed: ' . $conn->connect_error]
    ]);
    exit();
}

// Initialize response array
$response = [
    'status' => 'error',
    'messages' => []
];

// Collect and sanitize input
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$department = isset($_POST['department']) ? trim($_POST['department']) : '';

// Validate input
if (empty($name)) {
    $response['messages'][] = 'Name is required.';
} elseif (strlen($name) < 3) {
    $response['messages'][] = 'Name must be at least 3 characters long.';
}

if (empty($email)) {
    $response['messages'][] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['messages'][] = 'Invalid email format.';
}

if (empty($phone)) {
    $response['messages'][] = 'Phone number is required.';
} elseif (!preg_match('/^\d{10,15}$/', $phone)) {
    $response['messages'][] = 'Phone number must be between 10 and 15 digits.';
}

if (empty($department)) {
    $response['messages'][] = 'Department is required.';
}

// If there are validation errors, return them
if (!empty($response['messages'])) {
    echo json_encode($response);
    exit();
}

// Insert data into the database
$sql = "INSERT INTO managers (name, email, phone, department) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $department);

if ($stmt->execute()) {
    $response['status'] = 'success';
    $response['messages'][] = 'New manager added successfully.';
} else {
    $response['messages'][] = 'Database error: ' . $conn->error;
}

$stmt->close();
$conn->close();

// Return response
echo json_encode($response);
?>
