<?php
    if (isset($_SESSION['perfil'])){
      header('Location: index.php');
  }
?>

<?php include 'includes/top.php'; ?>
<div class="container">
  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Iniciar Sessão</h1>
      </div>

      <?php if(isset($_GET['erro'])){ ?>
        <p class='alert alert-danger'><?php echo urldecode($_GET['erro']); ?> </p>
      <?php } ?>
      
      <form method="post" action="loginValidaWeb.php">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Utilizador</label>
          <input type="text" class="form-control" name = "email" aria-describedby="emailHelp">
          <label for="exampleInputEmail1" class="form-label">Palavra-Passe</label>
          <input type="password" class="form-control" name = "password" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" class="btn btn-warning">Iniciar Sessão</button>
      </form>
      
      </div>
<?php include 'includes/bottom.php'; ?>