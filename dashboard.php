<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$foods = mysqli_query($conn, "SELECT * FROM foods");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-4">

    <div class="d-flex justify-content-between">
        <h2>Welcome, <?php echo $_SESSION['name']; ?> 🍔</h2>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <hr>

    <a href="admin.php" class="btn btn-dark mb-3">Admin Panel</a>

    <h3>Available Foods</h3>

    <div class="row">

        <?php while($food = mysqli_fetch_assoc($foods)) { ?>

        <div class="col-md-4">
            <div class="card p-3 shadow mb-3">

                <?php if($food['image']) { ?>
                    <img src="uploads/<?php echo $food['image']; ?>"
                    height="200">
                <?php } ?>

                <h4><?php echo $food['food_name']; ?></h4>
                <p><?php echo $food['description']; ?></p>
                <p><b>₹<?php echo $food['price']; ?></b></p>

                <a href="place_order.php?id=<?php echo $food['id']; ?>"
                class="btn btn-success">
                    Order Now
                </a>

            </div>
        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>