<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="blog">

<div class="header">
    Franz Stephen G. Duma-og
</div>

<div class="nav">
    Welcome, <?php echo $_SESSION['username']; ?> |
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <div class="post">
        <h1>Welcome to my page</h1>
        <p>Supposedly my dashboard or something...</p>
    </div>

</div>

</body>
</html>