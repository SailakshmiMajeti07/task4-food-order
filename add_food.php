<?php
session_start();
include("db.php");

if(isset($_POST['add'])) {
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($temp, "uploads/".$image);

    mysqli_query($conn, "INSERT INTO foods(food_name,price,category,image,description)
    VALUES('$food_name','$price','$category','$image','$description')");

    echo "<script>alert('Food Added'); window.location='admin.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2>Add Food Item</h2>

        <form method="POST" enctype="multipart/form-data">

            <input type="text" name="food_name"
            class="form-control mb-3"
            placeholder="Food Name" required>

            <input type="number" name="price"
            class="form-control mb-3"
            placeholder="Price" required>

            <input type="text" name="category"
            class="form-control mb-3"
            placeholder="Category" required>

            <textarea name="description"
            class="form-control mb-3"
            placeholder="Description"></textarea>

            <input type="file" name="image"
            class="form-control mb-3" required>

            <button type="submit" name="add"
            class="btn btn-success">
                Add Food
            </button>

        </form>

    </div>

</div>

</body>
</html>