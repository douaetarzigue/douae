
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

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $brand = $_POST["brand"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $oldPrice = $_POST["old_price"];
    $register = $_POST["register"];

    // Check if an image file is uploaded
    if ($_FILES["image"]["name"] !== "") {
      $image = $_FILES["image"]["name"];
      $targetDir = "./assets/products/";
      $targetFilePath = $targetDir . basename($image);
      move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
    } else {
      $targetFilePath = "";
    }

    // Insert the new product into the database
    $query = "INSERT INTO product (item_brand, item_name, item_price, item_oldprice, item_image, item_register)
              VALUES ('$brand', '$name', '$price', '$oldPrice', '$targetFilePath', '$register')";

    if (mysqli_query($conn, $query)) {
      echo "<script>
              alert('Product added successfully.');
              window.location.href = 'admin.php';
            </script>";
    } else {
      echo "<script>
              alert('Error adding product: " . mysqli_error($conn) . "');
              window.location.href = 'add_product.php';
            </script>";
    }
  }

  // Close the database connection
  mysqli_close($conn);
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="stylesheet" href="./bootstrap.min.css">
  <style>
    body{
        display: flex;
      justify-content: center;
      align-items: center;
    }
    .form-container {
        width: 800px;
      padding: 50px;
      margin-left:-100px;
      margin-top: 30px;
    }

    .form-container .form-group {
      margin-bottom: 20px;
    }

    .form-container .btn-primary {
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-container">
          <h2 class="text-center">Add Product</h2>
          <br>
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="brand">Brand:</label>
              <input type="text" class="form-control" id="brand" name="brand" required>
            </div>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
              <label for="old_price">Old Price:</label>
              <input type="number" class="form-control" id="old_price" name="old_price">
            </div>
            <div class="form-group">
              <label for="image">Image:</label><br>
              <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
              <label for="register">Register:</label>
              <input type="text" class="form-control" id="register" name="register" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
