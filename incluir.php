<?php

include 'conexao.php';

if (isset($_GET['retorno'])) {

  $sucesso = $_GET['retorno'];

  if ($sucesso='sucesso') {
    echo "<h1>EXCLUIDO COM SUCESSO</h1>";
  }
}

  //INCLUIR CLIENTE
  if (isset($_POST['nome_cliente']))  {

  $nome_cliente = $_POST['nome_cliente'];
  $email_cliente = $_POST['email_cliente'];
  $telefone_cliente = $_POST['telefone_cliente'];

    $sql_cliente = mysql_query("INSERT INTO cliente (nome, email, telefone) VALUES ('$nome_cliente', '$email_cliente', '$telefone_cliente')");
  }

  //INCLUIR PRODUTOS
  if (isset($_POST['nome_produtos']))  {

  $nome_produtos = $_POST['nome_produtos'];
  $descricao_produtos = $_POST['descricao_produtos'];
  $preco_produtos = $_POST['preco_produtos'];

    $sql_produtos = mysql_query("INSERT INTO produto (nome, descricao, preco) VALUES ('$nome_produtos', '$descricao_produtos', '$preco_produtos')");
  }

  //INCLUIR PEDIDOS
  if (isset($_POST['cliente_pedido']))  {

  
  $id_cliente = $_POST['cliente_pedido'];
  $id_produto = $_POST['produto_pedido'];

    $sql_produtos = mysql_query("INSERT INTO pedido (id_produto, id_cliente) VALUES ('$id_produto', '$id_cliente')");
  }


  //ALTERAR CLIENTE 
  if (isset($_POST['update_cliente_nome']))  {

  $update_cliente_nome = $_POST['update_cliente_nome'];
  $update_cliente_email = $_POST['update_cliente_email'];
  $update_cliente_telefone = $_POST['update_cliente_telefone'];
  $update_cliente_id = $_POST['update_cliente_id'];

  $sql_cliente = mysql_query("UPDATE cliente SET nome='$update_cliente_nome', email='$update_cliente_email', telefone='$update_cliente_telefone' WHERE ID=$update_cliente_id"); 

  }

    //ALTERAR PRODUTO 
  if (isset($_POST['update_produto_nome']))  {

  $update_produto_nome = $_POST['update_produto_nome'];
  $update_produto_descricao = $_POST['update_produto_descricao'];
  $update_produto_preco = $_POST['update_produto_preco'];
  $update_produto_id = $_POST['update_produto_id'];

  $sql_produtos = mysql_query("UPDATE produto SET nome='$update_produto_nome', descricao='$update_produto_descricao', preco='$update_produto_preco' WHERE ID=$update_produto_id"); 

  }




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="col-md-12">
      <h1>Incluir Cliente</h1>
      <form name="cliente" action="" method="post">
        <div class="col-md-12">
          <input type="text" name="nome_cliente" placeholder="nome" />
        </div>
        <div class="col-md-12">
          <input type="text" name="email_cliente" placeholder="email" />
        </div>
        <div class="col-md-12">
          <input type="text" name="telefone_cliente" placeholder="telefone" />
        </div>
        <div class="col-md-12">
          <input type="submit" value="Enviar" />
        </div>
      </form>

      <?php
      $mostra_clientes = mysql_query("SELECT ID, nome, email, telefone from cliente order by ID");

      echo "<table border='1'>";
       while($escrever_mostra_clientes=mysql_fetch_array($mostra_clientes)){
          echo "<tr>";
          echo "<form name='update_cliente' action='' method='post'>";
            echo "<td><input type='text' name='update_cliente_nome' value='".$escrever_mostra_clientes["nome"]."'/></td>";
            echo "<td><input type='text' name='update_cliente_email' value='".$escrever_mostra_clientes["email"]."'/></td>";
            echo "<td><input type='text' name='update_cliente_telefone' value='".$escrever_mostra_clientes["telefone"]."'/></td>";
            echo "<td><input type='submit' value='ENVIAR ALTERAÇÕES'></td>";
            echo "<td><a href='excluir.php?id_cliente=".$escrever_mostra_clientes["ID"]."'>Excluir</a></td>";
            echo "<td><input type='text' name='update_cliente_id' value='".$escrever_mostra_clientes["ID"]."' style='display:none;'/></td>";
          echo "</form>";
          echo "</tr>";
          
      }

      echo "</table>";

      ?>

    </div>

    <div class="col-md-12">
      <h1>Incluir produtos</h1>
      <form name="produtos" action="" method="post">
        <div class="col-md-12">
          <input type="text" name="nome_produtos" placeholder="nome" />
        </div>
        <div class="col-md-12">
          <input type="text" name="descricao_produtos" placeholder="descrição" />
        </div>
        <div class="col-md-12">
          <input type="text" name="preco_produtos" placeholder="preço" />
        </div>
        <div class="col-md-12">
          <input type="submit" value="Enviar" />
        </div>
      </form>

      <?php
      $mostra_produtos = mysql_query("SELECT ID, nome, descricao, preco from produto order by ID");

      echo "<table border='1'>";
       while($escrever_mostra_produtos=mysql_fetch_array($mostra_produtos)){
          echo "<tr>";
          echo "<form name='update_produto' action='' method='post'>";
            echo "<td><input type='text' name='update_produto_nome' value='".$escrever_mostra_produtos["nome"]."'/></td>";
            echo "<td><input type='text' name='update_produto_descricao' value='".$escrever_mostra_produtos["descricao"]."'/></td>";
            echo "<td><input type='text' name='update_produto_preco' value='".$escrever_mostra_produtos["preco"]."'/></td>";
            echo "<td><input type='submit' value='ENVIAR ALTERAÇÕES'></td>";
            echo "<td><a href='excluir.php?id_produto=".$escrever_mostra_produtos["ID"]."'>Excluir</a></td>";
            echo "<td><input type='text' name='update_produto_id' value='".$escrever_mostra_produtos["ID"]."' style='display:none;'/></td>";
          echo "</form>";
          echo "</tr>";
          
      }

      echo "</table>";

      ?>


    </div>

     <div class="col-md-12">
      <h1>Incluir pedido</h1>
      <form name="pedido" action="" method="post">
       
        Cliente:  <select name="cliente_pedido">

                  <?php

                  $select_cliente = mysql_query("SELECT ID, NOME from cliente");

                  while($escrever_cliente=mysql_fetch_array($select_cliente)){
                       echo "<option name='id_cliente' value='$escrever_cliente[ID]'>$escrever_cliente[NOME]</option>";
                    }

                  ?>

                  </select>

        Produto: 

        <select name="produto_pedido">

                  <?php

                  $select_produto = mysql_query("SELECT ID, NOME from produto");

                  while($escrever_produto=mysql_fetch_array($select_produto)){
                       echo "<option name='id_produto' value='$escrever_produto[ID]'>$escrever_produto[NOME]</option>";
                    }

                  ?>

                  </select>

        <input type="submit" value="Enviar" />

      </form>


      <?php
      $mostra_pedidos = mysql_query("SELECT ID, (SELECT nome from produto where pedido.id_produto=produto.ID) as NOME_PRODUTO, (SELECT nome from cliente where pedido.id_cliente=cliente.ID) as NOME_CLIENTE from pedido order by ID");

      echo "<table border='1'>";
       while($escrever_mostra_pedidos=mysql_fetch_array($mostra_pedidos)){
          echo "<tr>";
          echo "<td>".$escrever_mostra_pedidos["NOME_PRODUTO"]."</td>";
          echo "<td>".$escrever_mostra_pedidos["NOME_CLIENTE"]."</td>";
          echo "<td><a href='excluir.php?id_pedido=".$escrever_mostra_pedidos["ID"]."'>Excluir</a></td>";
          echo "</tr>";
          
      }

      echo "</table>";

      ?>

    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>