<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>

</body>
</html>

<?php require('./Vista/components/header.php');?>
<div class="wrap">
    <main class="main login">
        <div class="container login">
            <div class="imgSide">
                <div class="imgContainer">
                    <img src="https://i.imgur.com/zExpenQ.png" alt="" aria-hidden="true">
                </div>
            </div>
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                <h2>Registrate</h2>
                <div class="row">
                    <input type="text" name="name" required value="<?php if($errors == []){echo '';}else{echo $name;};?>" placeholder="Nombre">
                </div>
                <div class="row">
                    <input type="text" name="lastName" required value="<?php if($errors == []){echo '';}else{echo $lastName;};?>" placeholder="Apellido">
                </div>
                <div class="row">
                    <input type="email" name="email" required value="<?php if($errors == []){echo '';}else{echo $email;};?>" placeholder="Correo">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <input type="password" name="password" required value="<?php if($errors == []){echo '';}else{echo $password;};?>" placeholder="Contraseña">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <input type="text" name="username" required value="<?php if($errors == []){echo '';}else{echo $username;};?>" placeholder="Nombre de usuario">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <input type="file" name="profilePhoto" id="file">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                </div>
                <div class="login">
                    <input type="submit" name="submit" value="Sign in">
                </div>
                <?php if($errors != []):?>
                    <div class="error">
                        <ul>
                        <?php foreach($errors as $error):?>
                            <li><?= $error;?></li>
                        <?php endforeach;?>
                        </ul>
                    </div>
                <?php endif;?>
            </form>
        </div>
    </main>
</div>
<?php require('./Vista/components/footer.php');?>