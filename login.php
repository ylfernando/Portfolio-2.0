<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--- Estilos --->
        <link rel="stylesheet" type="text/css" href="Assets/CSS/login.css">
        <!--- Fontes -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,300&display=swap');
        </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Freitas Dev</title>
</head>
<body>
    <section class="section">
        <div class="container">
            <img src="Assets/Images/Login/logo.png" alt="Logo" class="logo">

            <!--- Login --->
            <div class="login-area">
            <form method="POST">
                <?php
                require 'Classes/admin.class.php';
                $a = new Admin();
                
                if(isset($_POST['email']) && isset($_POST['senha'])) {
                    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                    $senha = filter_input(INPUT_POST, 'senha');

                    if($a -> login($email, $senha)) {
                        ?>
                        <script type="text/javascript">window.location.href="dashboard.php"</script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">alert('E-mail ou senha incorretos!')</script>
                        <?php
                    }
                }
                ?>

                <div class="input-area">
                    <h2 class="h2-input">E-mail:</h2>
                    <input name="email" type="email" class="input" placeholder="Digite seu e-mail">
                </div>

                <div class="input-area">
                    <h2 class="h2-input">Senha:</h2>
                    <input name="senha" type="password" class="input" placeholder="Digite sua senha">
                </div>

                <input style="cursor: pointer" type="submit" value="Fazer login" class="btn-login"/>
                </form>
                
            </div>
        </div>
    </section>
</body>
</html>