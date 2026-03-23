<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $message = "All fields are required.";
    } else {
        $file = "users.txt";
        $data = $username . "|" . $password . "\n";
        file_put_contents($file, $data, FILE_APPEND);

        $message = "Account created! You can now login.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    Franz Stephen G. Duma-og
</div>

<div class="card">
    <h2>Create Account</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Sign Up</button>
    </form>

    <p class="<?php echo ($message == 'Account created! You can now login.') ? 'success' : 'error'; ?>">
        <?php echo $message; ?>
    </p>

    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>