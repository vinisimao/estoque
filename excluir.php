<?php

include 'conexao.php';


if (isset($_GET['id_produto'])) {
		$id_produto = $_GET['id_produto'];
		$sql = mysql_query("DELETE FROM produto WHERE ID=$id_produto");
}

if (isset($_GET['id_pedido'])) {
		$id_pedido = $_GET['id_pedido'];
		$sql = mysql_query("DELETE FROM pedido WHERE ID=$id_pedido");
}

if (isset($_GET['id_cliente'])) {
		$id_cliente = $_GET['id_cliente'];
		$sql = mysql_query("DELETE FROM cliente WHERE ID=$id_cliente");
}

 header("Location:incluir.php?retorno=sucesso");



?>