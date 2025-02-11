<?php 
include "conn/connect.php";
$lista_tipos = $conn->query("select * from tipos order by rotulo");
$rows_tipos = $lista_tipos->fetch_all();

?>
<!-- BOOTSTRAP -->
    <!-- abre a barra de navegação -->  
     
    <nav class="navbar navbar-expanded-md navbar-fixed-top navbar-light navbar-inverse">
        <div class="container-fluid">
            <!-- agrupamento Mobile -->
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#menupublico" aria-expanded="false">
                   <span class="sr-only">Toggle Navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>  
                </button>
                <a href="index.php" class="navbar-brand">
                    <img src="images/logo-chuleta.png" alt="Logotipo Chuleta Quente">
                </a>
            </div>
            <!-- Fecha agrupamento Mobile -->
            <!-- nav direita -->
            <div class="collapse navbar-collapse" id="menupublico">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="index.php">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li><a href="index.php#destaques">DESTAQUES</a></li>
                    <li><a href="index.php#produtos">PRODUTOS</a></li>
                    <!-- Dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            TIPOS
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach($rows_tipos as $row){ ?>
                                <li>
                                    <a href="produtos_por_tipo.php?id_tipo=<?php echo $row[0].'&rotulo='.$row[2]; ?>">
                                        <?php echo $row[2];?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <!-- Fim do dropdown -->
                    <li><a href="index.php#contato">CONTATO</a></li>
                    <!-- início formulário de busca -->
                    <form action="produtos_busca.php" method="get" name="form-busca" 
                    id="form-busca" class="navbar-form navbar-left" role="search">
                        <div class="input-group">
                            <input type="search" name="buscar" id="buscar" size="9" class="form-control"
                            aria-label="search" placeholder="Buscar produto" required>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </div>
                    </form>        
                    <!-- fim formulário de busca -->
                    <li class="active">
                        <a href="admin/index.php">
                            <span class="glyphicon glyphicon-user">&nbsp;ADMIN/CLIENTE</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>



    </nav>  