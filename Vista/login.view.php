<?php require('./Vista/components/header.php');?>

<div class="wrap">
    <main class="main login">
        <div class="container login">
            <div class="imgSide">
                <div class="imgContainer">
                    <img src="https://i.imgur.com/zExpenQ.png" alt="" aria-hidden="true">
                </div>
            </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <h2>Iniciar sesion</h2>
                <div class="row">
                    <input type="text" name="userEmail" id="userEmail" placeholder="Correo o nombre de usuario">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <input type="password" name="password" id="password" placeholder="Contraseña">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </div>
                <div class="login">
                    <input type="submit" name="submit" value="Login">
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
                <div class="createAccount">
                    <a class="txt2" href="./registro.php">Crea una cuenta<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>
<?php require('./Vista/components/footer.php');?>
