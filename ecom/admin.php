<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopee";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete product
if (isset($_GET['delete'])) {
    $productId = $_GET['delete'];
    $sql = "DELETE FROM product WHERE item_id = $productId";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting product: ' . $conn->error;);</script>";
    }
}

// Fetch products
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Fetch orders
$orderSql = "SELECT * FROM commande";
$orderResult = $conn->query($orderSql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <link rel="stylesheet" href="./bootstrap.min.css">
  <style>
    #body {
      padding: 20px; /* Add some padding to the body */
    }
  </style>
</head>
<body>
    <header >
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
       <b> <p class="font-rale font-size-12 text-black-50 m-0">Shoptronic</p></b>
        <div class="font-rale font-size-14">
            <a href="./logout.php" class="px-3 border-right border-left text-dark">Logout</a>
        </div>
    </div>
    </header>
    <div id="body">
  <div >
  <div class="d-flex justify-content-between">
      <h2>Product List</h2>
      <a class="btn btn-success" href="add_product.php">Add Product</a>
    </div>
    <br>
    <table class="table table-bordered table-striped">
      <thead class="thead-light">
        <tr class="text-center">
          <th>Item ID</th>
          <th>Image</th>
          <th>Brand</th>
          <th>Name</th>
          <th>Price</th>
          <th>Register</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='align-middle text-center'>";
                echo "<td>" . $row['item_id'] . "</td>";
                echo "<td><img src='" . $row['item_image'] . "' width='100' height='100'></td>";
                echo "<td>" . $row['item_brand'] . "</td>";
                echo "<td>" . $row['item_name'] . "</td>";
                echo "<td>" . $row['item_price'] . "</td>";
                echo "<td>" . $row['item_register'] . "</td>";
                echo "<td>";
                echo "<a class='btn btn-primary' href='edit_product.php?id=" . $row['item_id'] . "'>Edit</a> ";
                echo "<a class='btn btn-danger' href='admin.php?delete=" . $row['item_id'] . "' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No products found.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <br>
    <br>
    <br>

    <h2>Order List</h2>
    <br>
    <table class="table table-bordered table-striped">
      <thead class="thead-light">
        <tr class="text-center">
          <th>Order ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Country</th>
          <th>Region</th>
          <th>Postal Code</th>
          <th>Payment Methods</th>
          <th>Product ID</th>
          <th>Subtotal</th>
          <th>Total Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($orderResult->num_rows > 0) {
            while ($orderRow = $orderResult->fetch_assoc()) {
                echo "<tr class='align-middle text-center'>";
                echo "<td>" . $orderRow['id'] . "</td>";
                echo "<td>" . $orderRow['name'] . "</td>";
                echo "<td>" . $orderRow['email'] . "</td>";
                echo "<td>" . $orderRow['address'] . "</td>";
                echo "<td>" . $orderRow['country'] . "</td>";
                echo "<td>" . $orderRow['region'] . "</td>";
                echo "<td>" . $orderRow['postal'] . "</td>";
                echo "<td>" . $orderRow['payment_methods'] . "</td>";
                echo "<td>" . $orderRow['product_id'] . "</td>";
                echo "<td>" . $orderRow['subtotal'] . "</td>";
                echo "<td>" . $orderRow['total_price'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No orders found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
  </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
