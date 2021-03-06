<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Unirio</title>
</head>
<body>

<div class="container" >
    <a class="links" id="paracadastro"></a>
    <a class="links" id="paralogin"></a>
     
    <div class="content">      
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form method="post" action="cadastro_controller.php?acao=autenticar" autocomplete="off"> 
          <h1>Login</h1> 
           
          <p> 
            <label for="email_login">Seu e-mail</label>
            <input id="email_login" name="email_login" required="required"  type="email"  placeholder="ex. fulano@gmail.com" /> 
          </p>

          <p> 
            <label for="senha_login">Sua senha</label>
            <input id="senha_login" name="senha_login" required="required" type="password" placeholder="ex. senha"/>
          </p>
           
          <p> 
            <input type="checkbox" name="manterlogado" id="manterlogado" value="" /> 
            <label for="manterlogado">Manter-me logado</label>
          </p>
           
          <p> 
            <input type="submit" value="Logar" /> 
          </p>
           
          <p class="link">
            Ainda não tem conta?
            <a href="registra.php">Cadastre-se</a>
          </p>
        </form>
      </div>
    </div>
  </div>  
</body>
</html>
    
</body>
</html>