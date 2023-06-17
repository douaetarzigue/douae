<?php
  // Database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "shopee";

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Check if the product ID is provided
  if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Retrieve the product details from the database
    $query = "SELECT * FROM product WHERE item_id = $productId";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      $product = mysqli_fetch_assoc($result);

      // Display the product form for editing
      ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
  <link rel="stylesheet" href="./bootstrap.min.css">
  <style>
    body {
      padding: 50px; /* Add some padding to the body */
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit Product</h2>
        <form class="row g-3" action="./update_product.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="product_id" value="<?php echo $product['item_id']; ?>">

          <div class="col-md-6">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $product['item_name']; ?>">
          </div>

          <div class="col-md-6">
            <label for="brand" class="form-label">Brand:</label>
            <input type="text" name="brand" id="brand" class="form-control" value="<?php echo $product['item_brand']; ?>">
          </div>

          <div class="col-md-6">
            <label for="price" class="form-label">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="<?php echo $product['item_price']; ?>">
          </div>

          <div class="col-md-6">
            <label for="old_price" class="form-label">Old Price:</label>
            <input type="text" name="old_price" id="old_price" class="form-control" value="<?php echo $product['item_oldprice']; ?>">
          </div>

          <div class="col-12">
            <label for="image" class="form-label">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
          </div>

          <div class="col-12">
            <label for="register" class="form-label">Register:</label>
            <input type="text" name="register" id="register" class="form-control" value="<?php echo $product['item_register']; ?>">
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary ">Update Product</button>
          </div>
        </form>
        <?php
      } else {
        echo "Product not found.";
      }

      // Close the database connection
      mysqli_close($conn);
    } else {
      echo "Product ID not provided.";
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>