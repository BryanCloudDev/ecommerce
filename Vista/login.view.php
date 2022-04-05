<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <label for="userEmail">Email or username</label>
        <input type="text" name="userEmail" id="userEmail">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" value="Log In">
    </form>
</body>
</html>