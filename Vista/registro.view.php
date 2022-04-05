<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?= $name;?>" required>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" required>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <label for="username">Username</label>
        <input type="text" name="username" required>
        <label for="profilePhoto">Desired profile photo</label>
        <input type="file" name="profilePhoto">
        <input type="submit" name="submit" value="Send">
    </form>
</body>
</html>