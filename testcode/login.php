<?php
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $message = "All fields are required.";
    } else {
        $file = "users.txt";

        if (file_exists($file)) {
            $users = file($file, FILE_IGNORE_NEW_LINES);

            foreach ($users as $user) {
                list($stored_user, $stored_pass) = explode("|", $user);

                if ($username == $stored_user && $password == $stored_pass) {
                    $_SESSION['username'] = $username;
                    header("Location: home.php");
                    exit();
                }
            }
        }

        $message = "Incorrect username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    Franz Stephen G. Duma-og
</div>

<div class="card">
    <h2>Login</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>

    <p class="error"><?php echo $message; ?></p>

    <p>No account? <a href="signup.php">Sign up</a></p>
</div>

</body>
</html>