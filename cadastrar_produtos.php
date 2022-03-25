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
<?php
	require('connect.php');
	
	$pro_pro = trim($_POST['pro_pro']);
    $pro_pre = trim($_POST['pre_pro']);
    $pro_cus = trim($_POST['cus_pro']);
		
	$sql = mysqli_query($conn,"SELECT * FROM $tab_pro WHERE `produto` = '$pro_pro'");
	
	$n = mysqli_num_rows($sql);

	if($n != 0)
	{
		?>
			<pag>	
				<h2>CADASTRAR PRODUTOS</h2><p>
				<table>
					<tr>
						<td><h5>PRODUTO JÁ CADASTRADO</h5></td>
					</tr>	
				</table>
			</pag>
		<?php
		}
	else
	{	
        $data = date('Y/m/d');
        $pro_luc = ($pro_pre-$pro_cus);		
		$sql = mysqli_query($conn,"INSERT INTO $tab_pro (`cadastro`, `produto`, `quantidade`, `preco`, `custo`, `lucro`)  VALUES ('$data', '$pro_pro', '0', '$pro_pre', '$pro_cus', '$pro_luc')");	
			
        ?>
            <pag>
                <h2>CADASTRAR PRODUTOS</h2><p>
                <table>
                    <tr>
                        <td><h7>PRODUTO CADASTRADO</h7></td>
                    </tr>
                </table>
            </pag>
        <?php
	}		
?>
		<urn>
            <table border=1>
                <h3>PRODUTOS CADASTRADOS</h3>
                <tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>CADASTRO</h3></td>
                    <td><h3>PRODUTO</h3></td>
                    <td><h3>QUANTIDADE</h3></td>
                    <td><h3>PREÇO</h3></td>
                    <td><h3>CUSTO</h3></td>
                    <td><h3>LUCRO</h3></td>
                </tr>		
<?php   
                require('connect.php');
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
                                    <td><h4><nobr><?php echo $vn['preco'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['custo'];    ?></nobr></h4></td>					
                                    <td><h4><nobr><?php echo $vn['lucro'];    ?></nobr></h4></td>					
                                </tr>                                            
                        <?php   $i = $i + 1;
                    }   ?>
            </table>
        </urn>	
	</body>
</html>