<?php
include("db.php");

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = "User";

    mysqli_query($conn, "INSERT INTO users(name,email,password,role)
    VALUES('$name','$email','$password','$role')");

    echo "<script>alert('Registration Successful'); window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">
    <div class="card p-4 shadow mx-auto" style="max-width:500px;">
        <h2 class="text-center">Register</h2>

        <form method="POST">

            <input type="text" name="name" class="form-control mb-3"
            placeholder="Full Name" required>

            <input type="email" name="email" class="form-control mb-3"
            placeholder="Email" required>

            <input type="password" name="password" class="form-control mb-3"
            placeholder="Password" required>

            <button type="submit" name="register"
            class="btn btn-primary w-100">
                Register
            </button>

        </form>

        <p class="text-center mt-3">
            Already have account?
            <a href="login.php">Login</a>
        </p>
    </div>
</div>

</body>
</html>