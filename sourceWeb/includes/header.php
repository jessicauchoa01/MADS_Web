<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center align-items-center mb-md-0">
            <li><a href="index.php" style="background-color: #ffc107; padding:10px; border-radius: 50%;"><img src="assets/img/icon.png" width= 25px height = 25px alt=""></a></li>
            <?php if (isset($_SESSION['perfil'])){
              if ($_SESSION['perfil'] == 'Administrador'){?>
                <li><a href="utilizadores.php" class="nav-link px-2 text-white">Utilizadores</a></li>
                <li><a href="resPendente.php" class="nav-link px-2 text-white">Restaurantes</a></li>
                <li><a href="praPendente.php" class="nav-link px-2 text-white">Pratos</a></li>

              <?php }
              if ($_SESSION['perfil'] == 'Restaurante'){?>
                  <li><a href="ementa.php" class="nav-link px-2 text-white">Ementa</a></li>
                  <li><a href="encomendaRestaurante.php" class="nav-link px-2 text-white">Encomendas</a></li>
                  <li><a href="relatorio.php" class="nav-link px-2 text-white">Relatório</a></li>
              <?php }
              if ($_SESSION['perfil'] == 'Cliente' || !isset($_SESSION['perfil'] )) { ?>
                  <li><a href="pratos.php" class="nav-link px-2 text-white">Pratos</a></li>
                  <li><a href="encomendaCliente.php" class="nav-link px-2 text-white">Encomendas</a></li>
              <?php }
            }else{?>
              <li><a href="pratos.php" class="nav-link px-2 text-white">Pratos</a></li>
            <?php } ?>

        </ul>

        <div class="text-end">
          <?php if (!isset($_SESSION['perfil'])){ ?>
            <a href="registo.php"><button type="button"  class="btn btn-outline-warning">Registar</button></a>
            <a href="login.php"><button type="button"  class="btn btn-warning">Login</button></a>
            
          <?php } else { ?>
            <a href="loginTermina.php"><button type="button"  class="btn btn-warning">LogOut</button></a>
            <?php if ($_SESSION['perfil'] == 'Cliente'){?>
              <a href="carrinho.php" style="background-color: #ffc107; padding:10px; border-radius: 50%;"><img src="assets/img/cart.png" width= 25px height = 25px alt=""></a>
          <?php }} ?>
            
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.6.4.min.js"
      integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
      crossorigin="anonymous"
    ></script>
  </header>