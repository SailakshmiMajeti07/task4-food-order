<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM foods WHERE id='$id'");
$food = mysqli_fetch_assoc($result);

if(isset($_POST['order'])) {
    $quantity = $_POST['quantity'];
    $total = $food['price'] * $quantity;
    $user_id = $_SESSION['user_id'];

    mysqli_query($conn, "INSERT INTO orders(user_id, food_id, quantity, total_price, status)
    VALUES('$user_id','$id','$quantity','$total','Pending')");

    echo "<script>alert('Order Placed Successfully'); window.location='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Place Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

    <div class="card p-4 shadow mx-auto" style="max-width:500px;">

        <h2>Order Food</h2>

        <h4><?php echo $food['food_name']; ?></h4>
        <p>Price: ₹<?php echo $food['price']; ?></p>

        <form method="POST">

            <input type="number"
                   name="quantity"
                   min="1"
                   value="1"
                   class="form-control mb-3"
                   required>

            <button type="submit"
                    name="order"
                    class="btn btn-success w-100">
                Place Order
            </button>

        </form>

    </div>

</div>

</body>
</html>