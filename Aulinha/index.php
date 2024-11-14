<?php
    require_once 'funcoes.php';
    $u=new funcoes("aula", "localhost", "root", "");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form id="login" method="POST">
            <input type="email" name="email" placeholder=" ">
            <label for="email" id="email-label">E-mail</label>
            <br>
            <input type="password" name="senha" placeholder=" ">
            <label for="senha" id="senha-label">Senha</label>
            <br>
            <button>Entrar</button>
            <a href="../Aulinha/cadastro.php" target="_self" class="cadastro">Criar conta</a>
        </form>
        <?php
        if(isset($_POST['email'])){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            
            if(!empty($email) && !empty($senha)){
                if($u->logar($email, $senha)){
                    header("location: ../Aulinha/principal.php");
                    exit();
                }
                else{
                    echo "Email ou senha incorretos";
                }
            }
            else{
                echo "Preencha todos os campos corretamente";
            }
        }
    ?>
    </body>
</html>
