<?php
include("conecta.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <title>Re:Figure</title>
    <link rel="icon" href="imagem/RE FIGURE.png">
    <link rel="stylesheet" type="text/css" href="./css/carrinhon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    
<section id="cabecalho" class="cabecalho alinhamento m-0 p-0">

    <div class="cantologo col-md-4 d-flex justify-content-start align-itens-center text-align-center">

        <img class="logo" id="logo" onclick="Logo()" src="imagem/RE FIGURE.png">

    </div>
    <div class="nome canto col-md-4">
        <b>Re:Figure <i class="bi bi-tree"></i></b>
    </div>  
    <div class="canto col-md-4 justify-content-end align-itens-center text-align-center">

    </div>

</section>

<section id="carrinho">

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1><b>Meu Carrinho</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="tabela mt-4">
                    <div class="produto"><b>Produto</b></div>
                    <div class="preco"><b>Preço</b></div>
                    <div class="quantidade"><b>Quantidade</b></div>
                    <div class="total"><b>Total</b></div>
                </div>
                
                <div class="tabela1">
                    <table>
                    <?php 
             $comando = $pdo->prepare("SELECT * FROM produtos where carrinho = 1");
             $resultado = $comando->execute();

             while ($linhas = $comando->fetch() )
             {  
                 $nome = $linhas["nome_produto"]; // Nome da coluna XAMPP
                 $preco = $linhas["preco_produto"]; // Nome da coluna XAMPP
                 $qtd = $linhas["qtd_produto"]; // Nome da coluna XAMPP
                 
                 $pqtd = $pdo->prepare("UPDATE produtos SET preco_final = (preco_produto * qtd_produto);");
                 $final = $pqtd->execute();
                 $preco_final = $linhas["preco_final"]; 

                 $pqtd2 = $pdo->query("SELECT SUM(preco_final) FROM produtos where carrinho = 1;");
                 $final2 = $pqtd2->fetchColumn();
                 
                 $total = number_format($final2, 2, ',', ' ');
                ?>
                <tr class="giovani">
                <td><?php echo ('<img src="imagem/'.$nome.'.png" >'); ?></td>
                <td><?php echo($nome); ?></td>
                <td><p>R$</p><?php echo($preco); ?></td>
                <td><?php echo($qtd); ?> </td>
                <td><p>R$</p><?php echo($preco_final); ?></td>
                </tr>
            <?php } ?> 
                    </table>
                </div>
                <div class="alinharentrega mt-4">
        <div class="entrega"><b>Entrega</b> <br>
            <form action=""> 
                <div class="styleinput"><input type="number" placeholder="000000.000"></div>
                <div class="styleinput1"><input type="submit" value="Calcular"></div>
            </form>
                <h3 class="fs-4">Saiba se você tem Frete Gratis &nbsp; <i class="bi bi-truck"></i></h3>
        </div>
        <div class="aplicar"><b>Aplicar código de cupom</b> <br>
            <form action="">
                <div class="styleinput"><input type="text" placeholder="Cupom"></div>
                <div class="styleinput1"><input type="submit" value="Aplicar"></div>
            </form>
             </div>
             </div>
            </div>
            <div class="col-md-4">
            <div class="tabela2">
                <div class="resumo"><b>Resumo do Pedido</b></div>
                <div class="subtotal">
                    <div class="sub">Subtotal</div>
                    <div class="valor1">R$:0,00</div>
                </div>
                <div class="entrega1">
                    <div class="entr">Entrega</div>
                    <div class="valor2">R$:0,00</div>
                </div>
                <div class="total2">
                    <div class="tot">Total</div>
                    <div class="valor3">
                        <div class="valor4">R$:0,00</div>
                        <div class="valor5">R$<?php echo($total); ?></div>
                    </div>
                </div>
            </div>
            <div class="finalizar">
                <div class="adicionarmais"><input type="submit" value="Adicionar mais produtos"></div>
                <div class="fecharpedido"><input type="submit" value="Fechar Pedido"></div>
            </div>
            </div>
        </div>
    </div>

</section>

</body>
</html>