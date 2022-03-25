<?php 
	// Conexão com o banco de dados
	$conn = mysqli_connect("localhost", "root", "") or die("Não foi possível a conexão com o Banco");

	// Selecionando banco
	$db = mysqli_select_db($conn,"riopysom_bd") or die("Não foi possível selecionar o Banco");

	//Tabelas
	$tab_pro = "produtos";
 ?>