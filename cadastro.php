<?php
session_start();
require 'connect.php';
$nome = filter_input(INPUT_POST,  'nome', FILTER_SANITIZE_STRING);;
$email = filter_input(INPUT_POST,  'email', FILTER_SANITIZE_STRING);;
$senha = md5(filter_input(INPUT_POST,  'senha', FILTER_SANITIZE_STRING));
$query_select = "SELECT email FROM usuarios WHERE email = '$email'";
$select = mysqli_query($conn, $query_select);
$array = mysqli_fetch_array($select);

if(!$conn) {
    header("Location: error.php");
}

if(isset($nome)) {
    $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    $insert = mysqli_query($conn, $query);
    
    if($insert) {
        echo"<script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado com sucesso!');window.location.
        href='home.php'</script>"; 
    }
}
?>
<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <title>Criar conta no ChatBrasil</title>
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--Estilo css-->
        <link href="http://softgames.atwebpages.com/css/style.css" rel="stylesheet">
        <!--JavaScript-->
        <script type="text/javascript" src="http://chatbrasil.atwebpages.com/js/linked.js"></script>
    </head>
   <body>
      <div id="body_login">
         <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
               <a class="navbar-brand">Criar conta ChatBrasil</a>
               <button class="btn btn-primary" onclick="volta_login()">Login</button>
            </div>
         </nav>
         <div id="formulario_div_cadastro">
            <form method="POST" class="alert alert-secondary" id="formulario_cadastro">
               <h1 id="Info-login">Criar conta</h1>
               <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
                  <input type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Coloque o seu nome de cadastro.</div>
               </div>
               <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Coloque o seu email de cadastro.</div>
               </div>
               <div class="row mb-3">
                  <label for="InputPassword3" class="form-label">Senha</label>
                  <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
               </div>
               <div class="d-grid gap-2">
                   <button class="btn btn-primary">Criar conta</button>
               </div>
            </form>
         </div>
      </div>
   </body>