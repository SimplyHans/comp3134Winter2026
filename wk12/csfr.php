<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "host" && $password == "pass") {
        $message = "Login Successful";
    } else {
        $message = "Login Failed";
    }
}
?>

<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    <button type="submit">Login</button>
</form>

<div>
    <?php echo $message; ?>
</div>
