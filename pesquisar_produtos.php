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
        <urc>
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
                $cod_pro = trim($_POST['cod_pro']);
                $pro_pro = trim($_POST['pro_pro']);
                $cad_pro = trim($_POST['cad_pro']);
                $cad_pro2 = trim($_POST['cad_pro2']);
                $qua_pro = trim($_POST['qua_pro']);
                $pre_pro = trim($_POST['pre_pro']);
                $cus_pro = trim($_POST['cus_pro']);
                $luc_pro = trim($_POST['luc_pro']);
                
                if(!isset($_POST['opc'])) {
                    $fil_pro = "nul";
                } else {
                    $fil_pro = $_POST['opc'];
                }

                switch($fil_pro){
                    case "tod":
                        $sql = mysqli_query($conn,"SELECT * FROM $tab_pro ORDER BY `codigo` DESC");
                        break;
                    case "cod":
                        $sql = mysqli_query($conn,"SELECT * FROM $tab_pro WHERE `codigo` = '$cod_pro' ORDER BY `codigo` DESC");
                        break;
                    case "pro":
                        $sql = mysqli_query($conn,"SELECT * FROM $tab_pro WHERE `produto` = '$pro_pro' ORDER BY `codigo` DESC");
                        break;
                    case "cad":
                        $sql = mysqli_query($conn,"SELECT * FROM $tab_pro WHERE `cadastro` >= '$cad_pro' and `cadastro` <= '$cad_pro2' ORDER BY `codigo` DESC");
                        break;
                    case "qua":
                        $sql = mysqli_query($conn,"SELECT * FROM $tab_pro WHERE `quantidade` = '$qua_pro' ORDER BY `codigo` DESC");
                        break;
                    case "pre":
                        $sql = mysqli_query($conn,"SELECT * FROM $tab_pro WHERE `preco` = '$pre_pro' ORDER BY `codigo` DESC");
                        break;
                    case "cus":
                        $sql = mysqli_query($conn,"SELECT * FROM $tab_pro WHERE `custo` = '$cus_pro' ORDER BY `codigo` DESC");
                        break;
                    case "luc":
                        $sql = mysqli_query($conn,"SELECT * FROM $tab_pro WHERE `lucro` = '$luc_pro' ORDER BY `codigo` DESC");
                        break;
                    default:
                        $sql = mysqli_query($conn,"SELECT * FROM $tab_pro WHERE `codigo` = '0'");
                        break;

                }

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
        </urc>	
	</body>
</html>