<!DOCTYPE html>
<html lang="en">
<head>
  <title>Place Order</title>
  <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Place Order</h2>
    <form action="process_order.php" method="POST">
      <div class="form-group">
        <label for="name">Full Name : </label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required>
      </div>
      <div class="form-group">
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" class="form-control" placeholder="you@example.com" required>
      </div>
      <div class="form-group">
        <label for="address">Address : </label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="country">Country : </label>
          <input type="text" name="country" id="country" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label for="region">Region : </label>
          <input type="text" name="region" id="region" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label for="postal">Postal Code : </label>
          <input type="number" name="postal" id="postal" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="payment-method">Payment Method : </label>
        <div>
          <input type="checkbox" name="payment_method[]" value="cash">
          <label for="credit_card">Cash on Delivery</label>
        </div>
        <div>
          <input type="checkbox" name="payment_method[]" value="credit_card">
          <label for="credit_card">Credit Card</label>
        </div>
        <div>
          <input type="checkbox" name="payment_method[]" value="paypal">
          <label for="paypal">PayPal</label>
        </div>
      </div>
      <!-- Hidden inputs for product ID and price and total amount of products -->
      <input type="hidden" name="product_id" value="<?php echo $_GET['product_id']; ?>">
      <input type="hidden" name="subtotal" value="<?php echo $_GET['subtotal']; ?>">
      <input type="hidden" name="total_price" value="<?php echo $_GET['total_price']; ?>">
      <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
  </div>
</body>
</html>
