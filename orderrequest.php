<?php
session_start();
include('head.php');
include('connection.php');
if ($_SESSION['type'] == "admin") {
    header("location: http://localhost/Juhosi%20Software%20Web%20Development/");
} elseif (empty($_SESSION)) {
    header("Location: http://localhost/Juhosi%20Software%20Web%20Development/");
}

function input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form values
    $id = $_SESSION['id'];
    $order_date = $_POST['order_date'];
    $company = $_POST['company'];
    $owner = $_POST['owner'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $weight = $_POST['weight'];
    $request = $_POST['request'];
    $track = $_POST['track'];
    $ship = $_POST['ship'];
    $count = $_POST['count'];
    $specification = $_POST['specification'];
    $check = $_POST['check'];

    /** @var object $con */
    // Prepare the SQL statement to insert the data
    $stmt = $con->prepare("INSERT INTO `customer` (id, order_date, company, owner, item, quantity, weight, request, tracking_id, shipment_size, box_count, specification, checklist_quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    // Prepare the statement and bind the parameters
    $stmt->bind_param("sssssssssssss", $id, $order_date, $company, $owner, $item, $quantity, $weight, $request, $track, $ship, $count, $specification, $check);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Data Inserted Successfully');
                window.location='http://localhost/Juhosi%20Software%20Web%20Development/order';  </script>";
    } else {
        echo "Server Error: " . $stmt->error;
    }
}
?>