<?php
session_start();
include("db.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM foods WHERE id='$id'");
$food = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    mysqli_query($conn, "UPDATE foods SET
    food_name='$food_name',
    price='$price',
    category='$category',
    description='$description'
    WHERE id='$id'");

    echo "<script>alert('Food Updated'); window.location='admin.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4 shadow">

        <h2>Edit Food</h2>

        <form method="POST">

            <input type="text" name="food_name"
            value="<?php echo $food['food_name']; ?>"
            class="form-control mb-3" required>

            <input type="number" name="price"
            value="<?php echo $food['price']; ?>"
            class="form-control mb-3" required>

            <input type="text" name="category"
            value="<?php echo $food['category']; ?>"
            class="form-control mb-3" required>

            <textarea name="description"
            class="form-control mb-3"><?php echo $food['description']; ?></textarea>

            <button type="submit" name="update"
            class="btn btn-warning">
                Update Food
            </button>

        </form>

    </div>
</div>

</body>
</html>