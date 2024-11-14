<?php
    require_once 'funcoes.php';
    $u=new funcoes("aula", "localhost", "root", "");
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloPaginaCadastro.css">
    <title>Cadastrar-se</title>
</head>
<body>
    <form id="login" method="POST">
        <input type="text" name="nome" id="nome" placeholder=" ">
        <label for="nome" id="nome-label">Nome</label>
        <br>
        <input type="email" name="email" id="email" placeholder=" ">
        <label for="email" id="email-label">E-mail</label>
        <br>
        <input type="password" name="senha" id="senha" placeholder=" ">
        <label for="password" id="password-label">Senha</label>
        <br>
        <input type="password" name="conf_Senha" id="conf_Senha" placeholder=" ">
        <label for="conf_password" id="conf_password-label">Confirmar Senha</label>
        <table>
            <tr>
                <td><input type="submit" name="submit" value="Criar conta">
                <td><a href="../Aulinha/index.php" target="_self">Entrar</a>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $conf_senha = addslashes($_POST['conf_Senha']);
            
            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($conf_senha)){
                if($senha==$conf_senha){
                    if($u->cadastro($nome, $email, $senha)){
                        echo "Email cadastrado com sucesso";
                    }
                    else{
                        echo "Email já cadastrado";
                    }
                }
                else{
                    echo "As duas senhas não batem";
                }
            }
            else{
                echo "Preencha todos os campos corretamente";
            }
        }
    ?>
</body>