<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form inputs
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $region = $_POST['region'];
  $postal = $_POST['postal'];
  $paymentMethodsArray = $_POST['payment_method']; 
  $productID = $_POST['product_id'];
  $subtotal = $_POST['subtotal'];
  $totalPrice = $_POST['total_price'];

  // Your database connection code
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "shopee";
  // Create a new PDO instance
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Insert the data into the "commande" table
  $sql = "INSERT INTO commande (name, email, address, country, region, postal, payment_methods, product_id, subtotal, total_price)
          VALUES (:name, :email, :address, :country, :region, :postal, :paymentMethods, :productID, :subtotal, :totalPrice)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':address', $address);
  $stmt->bindParam(':country', $country);
  $stmt->bindParam(':region', $region);
  $stmt->bindParam(':postal', $postal);
  $paymentMethodsString = implode(', ', $paymentMethodsArray);
  $stmt->bindParam(':paymentMethods', $paymentMethodsString);
  $stmt->bindParam(':productID', $productID);
  $stmt->bindParam(':subtotal', $subtotal);
  $stmt->bindParam(':totalPrice', $totalPrice);
  $stmt->execute();

  // Empty the "cart" table
  $truncateSql = "TRUNCATE TABLE cart";
  $conn->exec($truncateSql);

  // Close the database connection
  $conn = null;

  // Redirect or display success message
  echo "<script>
              alert('Your order has been placed successfully');
              window.location.href = 'index.php';
            </script>";
  exit();
}
?>
