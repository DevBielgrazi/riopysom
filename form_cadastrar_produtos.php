<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="imagem/favicone.png"/>
		<link href="estilo.css" rel="stylesheet">
		<title>Controle de Estoque</title>
	</head> 
	<body>
		<menu>
			<a href="http://localhost/riopysom"><img src="imagem/logo.jpeg" width=20%></a>
			<h1>CONTROLE DE ESTOQUE</h1><p>
				<table class="tableb">
						<tr><td><a href="form_cadastrar_produtos.php"><button>CADASTRO</button></a></td></tr>
						<tr><td><a href="form_pesquisar_produtos.html"><button>PESQUISA</button></a></td></tr>
				</table>
		</menu>
		<pag>
			<h2>CADASTRAR PRODUTOS</h2><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_produtos.php">
							<table>
								<tr>
									<td><h4>PRODUTO:</h4></td>
									<td><input name="pro_pro" type=text size=16 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>QUANTIDADE:</h4></td>
									<td><input name="qua_pro" type=int size=16 maxlength=16 required></td>
								</tr>
                                <tr>
									<td><h4>CUSTO:</h4></td>
									<td><input name="cus_pro" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>PREÇO:</h4></td>
									<td><input name="pre_pro" type=float size=16 maxlength=16 required></td>
								</tr>
							</table>
							<tr>
								<td><input class="inputb" type=submit value=CADASTRAR></td>
							</tr>
						</form>
					</td>	
				</tr>																				 
			</table>
		</pag>
        <urn>
            <table border=1>
                <h3>PRODUTOS CADASTRADOS</h3>
                <tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>CADASTRO</h3></td>
                    <td><h3>DESCRIÇÃO DO PRODUTO</h3></td>
                    <td><h3>QUANT</h3></td>
                    <td><h3>PREÇO<br>UNI</h3></td>
                    <td><h3>CUSTO<br>UNI</h3></td>
                    <td><h3>LUCRO<br>REAL</h3></td>
                    <td><h3>LUCRO</h3></td>
                </tr>		
<?php   require('connect.php');
				$sql = mysqli_query($conn,"SELECT * FROM $tab_pro ORDER BY `codigo` DESC LIMIT 5");
				$n = mysqli_num_rows($sql);
                $i=0;
                    while($i!=$n)
                    {
                        $vn = mysqli_fetch_array($sql);	?>                        
                                <tr>
									<td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['produto'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['quantidade'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo "R$".$vn['preco'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo "R$".$vn['custo'];    ?></nobr></h4></td>					
                                    <td><h4><nobr><?php echo "R$".$vn['lucro_real'];    ?></nobr></h4></td>					
                                    <td><h4><nobr><?php echo $vn['lucro']."%";    ?></nobr></h4></td>					
                                </tr>                                            
                        <?php   $i = $i + 1;
                    }   ?>
            </table>
        </urn>	
	</body>
</html>