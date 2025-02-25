<?php 
include 'conn/connect.php';
$idTipo = $_GET['id_tipo'];
$rotulo = $_GET['rotulo'];
$listaPorTipo = $conn->query('select * from vw_produtos where tipo_id ='. $idTipo);
$rowPorTipo = $listaPorTipo->fetch_assoc();
$numLinhas = $listaPorTipo->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Chuleta Quente Churrascaria</title>
</head>

<body class="fundofixo">
    <?php include "menu_publico.php" ?>
    <div class="container">

<!-- Mostrar se a consulta retornar vazio -->
<?php if($numLinhas == 0){ ?>
    <h2 class="breadcrumb alert-danger">
        <a href="javascript:window.history.go(-1)" class="btn btn-danger">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        Não há produtos cadastrados tipo <?php echo $rotulo; ?>
    </h2>
<?php }?>
<!-- mostrar se a consulta retornou produtos -->
<?php if($numLinhas > 0){ ?>
    <h2 class="breadcrumb alert-danger">
        <a href="javascript:window.history.go(-1)" class="btn btn-danger">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <strong><?php echo $rotulo; ?></strong>
    </h2>
    <div class="row">
        <?php do{ ?>
            <div class="col-sm-6 col-md-4 ">
                <div class="thumbnail ">
                   <a href="produto_detalhes.php?id=<?php echo $rowPorTipo['id'] ?>">
                       <img src="images/<?php echo $rowPorTipo['imagem'] ?>" alt="" class="img-responsive img-rounded"> 
                   </a> 
                  <div class="caption text-right bg-success"> 
                    <h3 class="text-danger">
                        <strong><?php echo $rowPorTipo['descricao'] ?></strong>
                    </h3>
                    <p class="text-warning">
                        <strong><?php echo $rowPorTipo['rotulo'] ?></strong>
                    </p>
                    <p class="text-left">
                        <?php echo mb_strimwidth($rowPorTipo['resumo'],0,42,'...'); ?>
                    </p>
                    <p>
                        <button class="btn btn-default disabled" role="button" style="cursor: default;">
                            <?php echo "R$ ".number_format($rowPorTipo['valor'],2,',','.') ?>
                        </button>
                        <a href="produto_detalhes.php?id=<?php echo $rowPorTipo['id']; ?>">
                            <span class="hidden-xs">Saiba mais..</span>
                            <span class="hidden-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                    </p>
                  </div>
                </div>
                
            </div>
        <?php }while($rowPorTipo = $listaPorTipo->fetch_assoc()); ?>
    </div>

<?php } ?>

</main>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on('ready', function(){
        $(".regular").slick({
            dots:true,
            infinity:true,
            slidesToShow:3,
            slidesToScroll:3 
        });
        
    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick.min.js"></script>
</html>
