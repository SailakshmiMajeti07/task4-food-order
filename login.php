<?php
session_start();
include("db.php");

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'");

    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Invalid Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">
    <div class="card p-4 shadow mx-auto" style="max-width:500px;">
        <h2 class="text-center">Login</h2>

        <form method="POST">

            <input type="email" name="email"
            class="form-control mb-3"
            placeholder="Email" required>

            <input type="password" name="password"
            class="form-control mb-3"
            placeholder="Password" required>

            <button type="submit" name="login"
            class="btn btn-success w-100">
                Login
            </button>

        </form>

        <p class="text-center mt-3">
            New user?
            <a href="register.php">Register</a>
        </p>
    </div>
</div>

</body>
</html>