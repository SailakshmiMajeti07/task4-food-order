<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$foods = mysqli_query($conn, "SELECT * FROM foods");
$orders = mysqli_query($conn, "SELECT * FROM orders");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-4">

    <h2>Admin Panel</h2>

    <a href="add_food.php" class="btn btn-success mb-3">Add Food</a>
    <a href="dashboard.php" class="btn btn-primary mb-3">Back</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Food</th>
            <th>Price</th>
            <th>Category</th>
            <th>Action</th>
        </tr>

        <?php while($food = mysqli_fetch_assoc($foods)) { ?>
        <tr>
            <td><?php echo $food['id']; ?></td>
            <td><?php echo $food['food_name']; ?></td>
            <td>₹<?php echo $food['price']; ?></td>
            <td><?php echo $food['category']; ?></td>
            <td>
                <a href="edit_food.php?id=<?php echo $food['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_food.php?id=<?php echo $food['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php } ?>

    </table>
    <h3 class="mt-5">Customer Orders</h3>

<table class="table table-bordered">
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Food ID</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Status</th>
    </tr>

    <?php while($order = mysqli_fetch_assoc($orders)) { ?>
    <tr>
        <td><?php echo $order['id']; ?></td>
        <td><?php echo $order['user_id']; ?></td>
        <td><?php echo $order['food_id']; ?></td>
        <td><?php echo $order['quantity']; ?></td>
        <td>₹<?php echo $order['total_price']; ?></td>
        <td><?php echo $order['status']; ?></td>
    </tr>
    <?php } ?>
</table>

</div>

</body>
</html>