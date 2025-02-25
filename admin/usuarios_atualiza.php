<?php
// Incluindo o sistema de autenticação SUPERVISOR
include "acesso_com.php";
// Incluir o arquivo e fazer a conexão
include "../conn/connect.php";
// Atualizando os dados
if($_POST){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];
    $id    = $_POST['id'];

    $update = $conn->query("update usuarios set login = '".$login.
    "', senha = md5('".$senha."'), nivel = '".$nivel.
    "' where id = ".$id );
    if ($update)
    header('location: usuarios_lista.php');
}
if(isset($_GET['id'])){
    $user = $conn->query("select * from usuarios where id =".$_GET['id']); 
    $userrow = $user->fetch_assoc();
}

?>
<!-- html:5 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Usuários - Atualiza</title>
    <meta charset="UTF-8">
    <!-- Link arquivos Bootstrap CSS -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>
<body class="fundofixo">
<?php include "menu_adm.php"; ?>
<main class="container">
<div class="row">
<div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4"><!-- dimensionamento -->
    <h2 class="breadcrumb text-info">
        <a href="usuarios_lista.php">
            <button class="btn btn-info" type="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </button>
        </a>
        Atualizar Usuário
    </h2>
    <div class="thumbnail">
        <div class="alert alert-info">
            <form action="usuarios_atualiza.php" name="form_atualiza" id="form_atualiza" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" id="id" value="<?php echo $userrow['id'] ?>">

                <!-- input login -->
                <label for="login">Login:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </span>
                    <input type="text" name="login" id="login" autofocus maxlength="30" placeholder="Digite o seu login." class="form-control" required autocomplete="off" value="<?php echo $userrow['login']; ?>">
                </div><!-- fecha input-group -->
                <br>
                <!-- fecha input login -->

                <!-- input senha -->
                <label for="senha">Senha:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span>
                    </span>
                    <input type="password" name="senha" id="senha" maxlength="8" placeholder="Digite a NOVA senha." class="form-control" required autocomplete="off" value="">
                </div><!-- fecha input-group -->
                <br>
                <!-- fecha input senha -->

                <!-- radio nivel -->
                <label for="nivel">Nível do usuário</label>
                        <div class="input-group">
                            <label for="nivel_c" class="radio-inline">
                                <input type="radio" name="nivel" id="nivel" value="com" <?php echo $userrow['nivel']=='com'?"checked":null; ?> >Comum
                            </label>
                            <label for="nivel_s" class="radio-inline">
                                <input type="radio" name="nivel" id="nivel" value="sup" <?php echo $userrow['nivel']=='sup'?"checked":null; ?> >Supervisor
                            </label>
                        </div><!-- fecha input-group -->
                        <br>
                        <!-- Fecha radio nivel -->

                <!-- btn enviar -->
                <input type="submit" value="Atualizar" role="button" name="enviar" id="enviar" class="btn btn-block btn-info">
            </form>
        </div><!-- fecha alert -->
    </div><!-- fecha thumbnail -->
</div><!-- Fecha dimensionamento -->
</div><!-- Fecha row -->
</main>
    
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>