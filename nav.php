<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Ruryon</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="lanc.php">Releases</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="Categorias">Categoria<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categoria.php?cat=Esportivo">Esportivo</a></li>
            <li><a href="categoria.php?cat=Crossover">Crossover</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" name="frmpesquisa" method="get" action="busca.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar" name="txtBuscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho</a></li>
        <li><a href="#">Contato</a></li>

        <?php if(empty($_SESSION['ID'])) { ?> <!-- se estiver vazio a sessão id, mostrar menu logon -->

        <li><a href="formlogon.php"><span class="glyphicon glyphicon-home"> Login</a></li>
        <?php } else { // se não estiver vazio minha sessão, id irá verificar

          if($_SESSION['Status'] == 0) { // se a sessão status for 0, mostrar nome do usuário
          $consulta_usuario = $cn ->query ("select nm_usuario from tbl_usuario where cd_usuario = '$_SESSION[ID]'");
          $exibe_usuario = $consulta_usuario->fetch (PDO::FETCH_ASSOC);
        ?>
          <li><a href="areaUser.php"><span class="glyphicon glyphicon-user"> <?php echo $exibe_usuario['nm_usuario'];?></a></li>
          <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair </a></li>
          
          <?php } else { ?> <!-- se não for 0, a sessão irá criar um botão -->
            <li><a href="adm.php"> <button class="btn btn-sm btn-danger">Administrador</button></a></li>
            <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair </a></li>
          <?php } } ?>
          
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>