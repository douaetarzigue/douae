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
    $productId = $_POST["product_id"];
    $brand = $_POST["brand"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $oldPrice = $_POST["old_price"];
    $register = $_POST["register"];

    // Check if a new image file is uploaded
    if ($_FILES["image"]["name"] !== "") {
        // Delete the previous image file if needed
        $query = "SELECT item_image FROM product WHERE item_id = $productId";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $previousImage = $row["item_image"];
        unlink($previousImage);

        // Upload the new image file
        $image = $_FILES["image"]["name"];
        $targetDir = "./assets/products/";
        $targetFilePath = $targetDir . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

        // Update the product with the new image file
        $query = "UPDATE product SET
                    item_brand = '$brand',
                    item_name = '$name',
                    item_price = '$price',
                    item_oldprice = '$oldPrice',
                    item_image = '$targetFilePath',
                    item_register = '$register'
                WHERE item_id = $productId";
    } else {
        // Update the product without changing the image file
        $query = "UPDATE product SET
                    item_brand = '$brand',
                    item_name = '$name',
                    item_price = '$price',
                    item_oldprice = '$oldPrice',
                    item_register = '$register'
                WHERE item_id = $productId";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Product updated successfully.');
                window.location.href = 'admin.php'; // Replace 'admin.php' with the desired page
            </script>";
    } else {
        echo "<script>
                alert('Error updating product: " . mysqli_error($conn) . "');
                window.location.href = 'edit_product.php?id=$productId';
            </script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
