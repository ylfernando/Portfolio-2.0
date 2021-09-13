<?php
session_start();
if(!isset($_SESSION['login'])) {
    exit(header("Location: login.php"));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
            <!--- Estilos --->
            <link rel="stylesheet" type="text/css" href="Assets/CSS/dashboard.css">
            <!--- Fontes -->
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');
                @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,300&display=swap');
            </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Freitas Dev</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
            <div class="logo">
                <img src="Assets/Images/Login/logo-dashboard.png" alt="" class="logo-header">
            </div>
    </header>

    <!-- Section -->
    <section class="section">
        <div class="container-section">
            <div class="menu-area">
            <div class="menu">
                <nav class="nav">
                    <ul class="ul">
                        <a href="#">
                            <li class="menu-li active">Adicionar projeto
                                <svg class="img-li" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                width="50" height="50"
                                viewBox="0 0 172 172"
                                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#323297"><path d="M125.96475,16.72142c-18.0447,0.00014 -32.67273,14.62833 -32.67269,32.67303c0.00005,18.0447 14.62816,32.67281 32.67286,32.67286c18.0447,0.00005 32.67289,-14.62798 32.67303,-32.67269c-0.02022,-18.03653 -14.63667,-32.65298 -32.6732,-32.6732zM126.04546,35.51948c1.27124,0.03726 2.28251,1.07846 2.28267,2.35025v9.16151h9.07753c1.29873,0 2.35156,1.05283 2.35156,2.35156c0,1.29873 -1.05283,2.35156 -2.35156,2.35156h-9.07753v9.18514c0,1.29873 -1.05283,2.35156 -2.35156,2.35156c-1.29873,0 -2.35156,-1.05283 -2.35156,-2.35156v-9.18514h-9.10115c-1.29873,0 -2.35156,-1.05283 -2.35156,-2.35156c0,-1.29873 1.05283,-2.35156 2.35156,-2.35156h9.10115v-9.16151c0.00008,-0.63557 0.25742,-1.24404 0.7134,-1.68679c0.45598,-0.44275 1.07176,-0.68208 1.70705,-0.66346zM13.4375,48.375v106.82813h106.82813v-68.85866c-17.80469,-2.72949 -31.70279,-18.23437 -31.70279,-36.92425c0,-0.35845 0.03191,-0.70927 0.04199,-1.04521h-1.93295v25.28127c0.01052,0.75817 -0.34918,1.47389 -0.96385,1.91786c-0.38751,0.28165 -0.8542,0.43346 -1.33325,0.4337c-0.26441,-0.00013 -0.52687,-0.04517 -0.7762,-0.13319l-16.74963,-5.87891l-16.74438,5.87891c-0.71314,0.2549 -1.50605,0.14238 -2.12011,-0.30086c-0.61406,-0.44324 -0.97055,-1.16038 -0.95319,-1.91751v-25.28127zM51.73438,48.375v21.96388l14.35149,-5.05415c0.48639,-0.17666 1.01942,-0.17666 1.50581,0l14.37708,5.05415v-21.96388zM40.07761,98.42969h35.06676c1.29873,0 2.35156,1.05283 2.35156,2.35156c0,1.29873 -1.05283,2.35156 -2.35156,2.35156h-35.06676c-1.29873,0 -2.35156,-1.05283 -2.35156,-2.35156c0,-1.29873 1.05283,-2.35156 2.35156,-2.35156zM40.07761,116.90625h53.52364c1.29873,0 2.35156,1.05283 2.35156,2.35156c0,1.29873 -1.05283,2.35156 -2.35156,2.35156h-0.00131h-53.52233c-1.29873,0 -2.35156,-1.05283 -2.35156,-2.35156c0,-1.29873 1.05283,-2.35156 2.35156,-2.35156z"></path></g></g></svg>
                            </li>
                        </a>
                    </ul>
                </nav>
                <a href="index.php" class="link">Voltar para o início</a>
            </div>
        </div>

        <div class="add-projeto-area">
            <div class="formulario-area">
                <form enctype="multipart/form-data" method="POST">
                    <label class="label">
                        <h2 class="h2-form">Nome do cliente:</h2>
                        <input type="text" class="input" name="empresa"/>
                    </label> <br> <br>
                    
                    <label class="label">
                        <h2 class="h2-form">Logo do cliente:</h2>
                        <input multiple type="file" class="input" name="logo"/>
                    </label> <br> <br>

                    <input class="btn-add" type="submit" value="Adicionar projeto">
                </form>
            </div>
        </div>
        </div>
    </section>
</body>
</html>