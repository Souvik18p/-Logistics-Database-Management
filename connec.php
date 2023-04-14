<?php
// Establish a database connection
$servername = "localhost:3308";
$username = "root";
$password = "souvik";
$dbname = "shipment";

$conn = mysqli_connect('localhost:3308', 'root', 'souvik', 'logistic');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $country = $_POST["country"];
  $pickup_address = $_POST["pickup_address"];
  $delivery_address = $_POST["delivery_address"];
  $package_type = $_POST["package_type"];
  $package_weight = $_POST["package_weight"];
  $shipping_method = $_POST["shipping_method"];
  $payment_method = $_POST["payment_method"];
  $cod_amount = $_POST["cod_amount"];

  // Prepare a SQL query to insert the form data into the database
  $sql = "INSERT INTO shipment (name, phone, country, pickup_address, delivery_address, package_type, package_weight, shipping_method, payment_method, cod_amount)
  VALUES ('$name', '$phone', '$country', '$pickup_address', '$delivery_address', '$package_type', '$package_weight', '$shipping_method', '$payment_method', '$cod_amount')";

  // Execute the SQL query
  if (mysqli_query($conn, $sql)) {
    echo "Record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>