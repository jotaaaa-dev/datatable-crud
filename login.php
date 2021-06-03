<?php session_start() ?>

<!doctype html>
<html lang="pt-br">

  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <meta charset="utf-8">

    <title>Cadastro de Produtos</title>

    <link rel="stylesheet" type="text/css" href="media/css/login.css">

  </head>
  <body class="text-center">
    
<main class="form-login">
  <form action="logar.php" method="POST" >
    <img class="mb-4" src="img/cadastroIMG.png" alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal">Login</h1>
    <br>
      <form>
          <div class="form-floating">
            <input name="login" type="text" class="form-control" placeholder="João4421" required>
            <label>Login:</label>
          </div>
          <div class="form-floating">
            <input name="senha" type="password" class="form-control" placeholder="Senha" required>
            <label>Senha:</label>
            <br>
        <button type="submit" class="w-100 btn btn-lg btn-primary">Iniciar Sessão</button>
      </form>
  </form>
</main>
    
  </body>
</html>