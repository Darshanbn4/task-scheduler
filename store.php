<?php
// Retrieve the incoming JSON data from the request body
error_reporting(E_ALL);
ini_set('display_errors', 1);
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);
$email=$_GET['email'];
echo $email;
/*$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData);

// Access the extracted data
$slNo = $data->slNo;
$crNo = $data->crNo;
$taskNo = $data->taskNo;
$dueDate = $data->dueDate;
$personName = $data->personName;
$email = $data->email;
$phone = $data->phone;
echo $slNo;*/
$data = json_decode(file_get_contents("php://input"), true);

echo "Hello, " . $data["name"] . "!";
echo PHP_EOL;
echo "Your email address is " . $data["email"];

// You can perform further operations with the extracted data
// For example, store the data in a database or process it in any way you need

// Sending a response back to the JavaScript fetch call
$response = "Data received successfully!";
echo $response;
// Create a MySQL database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tata";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute an SQL INSERT statement
//$stmt = $conn->prepare("INSERT INTO tasks (sl_no, cr_no, task_No, due_date, present_date,person_name, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
//$stmt->bind_param( $input['slNo'], $input['crNo'], $input['taskNo'], $input['dueDate'], $input['presentDate'],$input['personName'], $input['email'], $input['phone']);

/*if ($stmt->execute()) {
    echo "Data stored successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();*/
?>