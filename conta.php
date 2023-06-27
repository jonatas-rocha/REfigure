<?php
session_start();
$logado = $_SESSION["logado"];
include("conecta.php");
$comando = $pdo->prepare("SELECT * FROM cadastro WHERE email_cliente = '$logado'");
$resultado = $comando->execute();
$logado = 0;
while ($linhas = $comando->fetch() )
     {
         $logado = $linhas["logado"]; // Nome da coluna XAMPP
     }
     include("conecta.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <title>Re:Figure</title>
    <link rel="stylesheet" type="text/css" href="css/conta.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="imagem/RE FIGURE.png">
</head>
<body>
    
    <div class="cabecalho">
        <div class="divvoltar"><a href="logado.php"><img src="imagem/botaovoltar.png" class="botaovoltar"></div></a>
        <a href="logado.php">
        <img class="logo" src="imagem/RE FIGURE.png"></a>
        <div class="invisivel"></div>
    </div>

    <?php
    $comando = $pdo->prepare("SELECT * FROM cadastro where logado = 1");
    $resultado = $comando->execute();
        while ($linhas = $comando->fetch() )
             {
                 $nome = $linhas["nome_cliente"]; // Nome da coluna XAMPP
                 $cpf = $linhas["cpf_cliente"]; // Nome da coluna XAMPP
                 $email = $linhas["email_cliente"]; // Nome da coluna XAMPP
                 $celular = $linhas["celular_cliente"]; // Nome da coluna XAMPP
                 $rua = $linhas["rua"]; // Nome da coluna XAMPP
                 $numero = $linhas["numero_local"]; // Nome da coluna XAMPP
                 $complementos = $linhas["complementos"]; // Nome da coluna XAMPP
                 $estado = $linhas["estado"]; // Nome da coluna XAMPP
                 $cidade = $linhas["cidade"]; // Nome da coluna XAMPP
                 $pais = $linhas["pais"]; // Nome da coluna XAMPP

             }?>

<div class="informacao">
    <form class="area">
        <div class="minhaconta"><h1 ><ion-icon class="icone" name="person-circle-outline"></ion-icon><b>Minha Conta</b></h1></div>
        <div class="informacoes">
        <h2><b>Informações de Acesso</b></h2>
        <h3><?php echo($nome); ?></h3>
        <h4><?php echo($email); ?></h4>
        </div>
        <div class="botoesalterar">
        <button class="btn1"><b>Editar</b></button>
        <br>
        <button class="btn1"><b>Mudar Senha</b></button>
        </div>
        <br> <br> <br>
        <div class="enderecotitulo"><ion-icon class="icone" name="location-outline"></ion-icon><b>Endereços Cadastrados</b><button class="btn2"><b>Gerenciar Endereços</b></button></div>
        <br>
        <div class="enderecos">
            <h1><b>Endereço de Cobrança Padrão</b></h1>
            <h2><?php echo($nome); ?></h2>
            <h2>(<?php echo($rua); ?>, <?php echo($numero); ?>, <?php echo($complementos); ?>)</h2>
            <h2>(<?php echo($cidade); ?>, <?php echo($estado); ?>, <?php echo($pais); ?>)</h2>
            <h2>Tel: <?php echo($celular); ?></h2>
        </div>
        <br>
        <div class="meuspedidostitulo"><ion-icon class="icone" name="list-outline"></ion-icon><b>Meus Pedidos</b></div>
        <br>
        <table class="tabela">
        <tr>
            <td><b>#</b></td>
            <td><b>Data</b></td>
            <td><b>Método</b></td>
            <td><b>Valor Total</b></td>   
            <td><b>Status</b></td>
        </tr>

        <tr>
            <td>(id)</td>
            <td>(Data e Hora)</td>
            <td>(Método de Pagamento)</td>
            <td>(R$ 000,00)</td>   
            <td>Enviado</td>
        </tr>
        <tr>
            <td>(id)</td>
            <td>(Data e Hora)</td>
            <td>(Método de Pagamento)</td>
            <td>(R$ 000,00)</td>   
            <td>Entrege</td>
        </tr>
        <tr>
            <td>(id)</td>
            <td>(Data e Hora)</td>
            <td>(Método de Pagamento)</td>
            <td>(R$ 000,00)</td>   
            <td>Cancelado</td>
        </tr>
    </table>
    <div class="invisivel"></div>
    </form>
</div>

<main>
<section id="rodape" class="m-0 p-0 mt-5">
          <div class="alinharrow row">
            <div class="alinhamentodalogo col-md-3">
              <img class="logorodape" id="logo" onclick="Logo()" src="imagem/RE FIGURE.png">
            </div>
            <div class="alinhamentorodape col-md-3">
              <p>Copyright &copy; 2023 - All Rights Reserved - Re:Figure</p>
            </div>
            <div class="delete col-md-3">
              <ul>
                <li>Desenvolvedores:</li>
                <li>Cauê Marchi Foyth</li>
                <li>Jônatas Rocha dos Santos</li>
                <li>Lucas Giovani Fruck</li>
              </ul>
            </div>
            <div class="alinhamentorodape col-md-3">
              <div class="divpai">
                <ul class="insta">
                  <a href="https://instagram.com/caue_foyth" target="_blank"><li><i class="bi bi-instagram"></i>Cauê</li></a>
                  <a href="https://instagram.com/arcaro_jonatas" target="_blank"><li><i class="bi bi-instagram"></i>Jônatas</li></a>
                  <a href="https://instagram.com/lucasgiovanifruck" target="_blank"><li><i class="bi bi-instagram"></i>Lucas</li></a>     
                </ul>
              </div>
            </div>
          </div>

</section>
</main>
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/conta.js"></script>
</body>
</html>