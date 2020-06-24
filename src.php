<?php
session_start();
include("functions/funcoes.php");
$pagina = $_GET['pg'];
$matricula[] = str_split($_SESSION['matricula']);
if ($pagina == 'painel'){
    if(!empty($_SESSION['id'])){}
    else{
        ob_start();
        $_SESSION['msg'] = "Login expirou!";
        header("Location: ../index.php");
        ob_end_flush();
    }
    if(isset($_SESSION['msg'])){
        echo "<div class='alert alert-danger' role='alert'>";
        echo$_SESSION['msg'];
        echo"</div>";
        unset($_SESSION['msg']);
    }
    ?>
<html>

<head>
    <meta charset="utf-8">
    <title>Painel do Aluno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>

<body class="">
    <nav class="navbar navbar-dark bg-primary  mb-2">
        <h1 class="navbar-brand ">Painel de acesso</h1>
        <a class="text-decoration-none text-reset" href="<?php echo"src.php?pg=sair";?>"><button type="button"
                class="btn btn-danger">Sair</button></a>
    </nav>
    <div class="card mb-1 bg-sencondary">
        <div class="card-body">
            <h5 class="card-title">Homenagens</h5>
            <p class="card-text">Acesso livre para todos os alunos</p>
            <a href="salas/homenagem.php" class="btn btn-info">Homenagens</a>
        </div>
    </div>
 
    <footer class=" page-footer font-small blue ">
        <nav class="navbar navbar-dark bg-primary">
            <h1 class="navbar-brand mx-auto">Escola Universo da Criança</h1>
            <h3 class="navbar-brand mx-auto"><?php echo $_SESSION['nome'];?></h3>
        </nav>

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright | Hants Tecnologys:
            <a href="https://www.linkedin.com/in/eliabe-paz-212927184/"> Eliabe G Paz </a>|
            <a href="administracao.php/"> Relátorio </a>|
            <a href="cadastrar.php/"> Painel de controle</a>
        </div>
        <!-- Copyright -->
    </footer>


</body>

</html>
<?php
}

if($pagina == 'sair'){
    unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['matricula'], $_SESSION['tipo']);
    $_SESSION['msg'] = "Deslogado com sucesso";
    header("Location: index.php");
}