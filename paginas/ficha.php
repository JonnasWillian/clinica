<?php
	include '../dados/conexaoBD.php';

	conectar($hostname,$bd,$usuario,$senha);

	/*$consulta =  $mysql->prepare("SELECT * FROM clientes");
	$consulta -> execute();
	$resultado =  $mysql->mysql_query("SELECT * FROM clientes");
	echo "<pre>"; var_dump($resultado);*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha médica</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Exo"> </head>

    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="script.js">

    <style>
        body {
            font-family: 'Exo', serif;
            font-size: 14px;
            background: #eee;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
        }

        h2 {
            margin: 20px 0 20px 0;
        }

        input,
        select {
            margin-bottom: 20px;
            border-radius: 0 !important;
        }

        .panel.panel-default {
            border-radius: 0;
        }

        .padding {
            padding: 40px;
        }

        .no-padding {
            padding: 0;
            margin: 0;
        }

        .border-right {
            border-right: 1px solid #ccc;
        }

        .badge {
            margin-left: 5px;
            background-color: #5bc0de;
        }

        .badge a {
            color: #fff;
        }

        .col-img {
            background: url('https://4.bp.blogspot.com/-t43kGQ83NDQ/WpdOJ2HppbI/AAAAAAAAB-o/ajy6puehUqMax4N83175Y7hVR8iOVqB9wCKgBGAs/s1600/25014823_172743660127958_6003870624856932352_n.jpg');
            background-size: cover;
        }

        .limpar,
        .enviar {
            float: right;
            margin: 20px 5px 0 0;
        }

        .enviar {
            margin: 20px 0 0 0;
        }
    </style>

</head>
<body>

    <main>

        <div class="text-center">
            <h2>Por favor, preencha seus dados para criar sua ficha</h2>
        </div>

        <div class="text-center">

            <div class="container">
		<h2>Formulário</h2>
		<div id="panel" class="panel panel-default no-padding" >
			<div class="panel-body no-padding">

				<form role="form" class="form-horizontal" method="post" action='upload.php'>
					<div class="row-fluid">
						<div class="col-md-5 col-sm-5 col-xs-12  padding">
							<p class="lead">Preencha sua ficha aqui</p>
							<div class="row">
								<div class="col-md-6">
									<label label-default="" for="">Nome</label>
									<select name="nome" class="form-control">
											<?php 
												$sql = 'SELECT * FROM clientes';
												$resultado = mysqli_query($mysql, $sql) or die ("Falha na consulta !" . $sql);
												
												foreach($resultado as $cad){

													$nome = $cad['nome'];
													$email = $cad['email'];
													$idade = $cad['idade'];
													$telefone = $cad['telefone'];
													$planSaude = $cad['planSaude'];
													$probSaude = $cad['probSaude'];

											?>
											<option> <?php echo( $cad['nome']) ; ?></option>
											<?php
												}
											 ?>
									</select>
								</div>
								<!--
								<div class="col-md-6">
									<label label-default="" for="">Tipo de atendimento</label>
									<input type="text" name="atendimento" class="form-control">
								</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label label-default="" for="">Plano de saúde</label>
										<input type="text" name="saude" class="form-control">
									</div>
									<div class="col-md-6">
										<label label-default="" for="">Doutor(a)</label>
										<select name="doutor" class="form-control">
											<option>Cristiane Moura dos Santos</option>
											<option>Marcela Silva Bandeira Moura</option>
										</select>
									</div>
								</div>
								-->
							<div class="row">
								<div class="col-md-6">
									<label label-default="" for="">Data Inicial</label>
									<input type="date" name="data_inicio" id="data_inicio" class="form-control">
								</div>
								<div class="col-md-6">
									<label label-default="" for="">Data Final</label>
									<input type="date" name="data_fim" id="data_fim" class="form-control">
								</div>
								<button type="button" class="btn btn-alert calcular-data" >Calcular data</button>
							</div>
							<!--
								<div class="row">
									<div class="col-md-6">
										<label label-default="" for="">Valor Recebido</label>
										<input type="text" name="recebido" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label label-default="" for="">Descrição do atendimento</label>
										<textarea name="descricao"></textarea>
									</div>
									<div class="col-md-6">
										<label label-default="" for="">Relatório</label>
										<textarea name="relatorio"></textarea>
									</div>
								</div>
							-->
							
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-4">
											<label label-default="" for=""></label>
											<input type="text" name="array" id="data0" class="form-control">
											<p id="data0" name="array"></p>
										</div>
										<div class="col-md-8">
											<label label-default="" for="">Período do acompanhamento médico</label>
										</div>
									</div>


									</div>
								</div>
							</div>
							<div class="row-fluid">
								<button class="btn btn-primary enviar">Enviar</button>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	        </div>

        </div>

        <div class="text-center">
            <a href="../inicial.html"><button type="button" class="btn btn-outline-primary">Voltar ao Menu</button></a>
        </div>
    </main>

	<script>

		//formatar data
		let data = new Date();
		function formatarData(data){
			let newDate = new Date(data);
			return `${newDate.getDate()}/${newDate.getMonth()+1}/${newDate.getFullYear()}`;
		}
		
		//Filtro - Referencia: https://www.youtube.com/watch?v=sDXkvb_rVxA
		//https://www.youtube.com/watch?v=o8fdyYZDKA0
		//https://pt.stackoverflow.com/questions/350074/como-remover-item-de-um-array-filtrando-pelo-valor
		//https://www.youtube.com/watch?v=sDXkvb_rVxA  <------------------------------- FILTRAR 

		$(document).on("click", ".calcular-data", function(e) {
			var data_inicio = document.getElementById('data_inicio').value;
        	var data_fim = document.getElementById('data_fim').value;
		
			
			let DatasFiltrar = [
				'14/08/2022', '07/9/2022', '12/10/2022', '15/10/2022', '17/10/2022', '28/10/2022', '02/11/2022', '15/11/2022'
				, '20/11/2022', '08/12/2022', '25/12/2022', '01/01/2023', '16/02/2023', '17/02/2023', '18/02/2023', '19/02/2023', '20/02/2023', '21/02/2023', '22/02/2023',
				'01/04/2023', '07/04/2023', '9/04/2023', '21/04/2023', '01/05/2023', '14/05/2023', '08/06/2023', '08/06/2023', '12/06/2023', '24/06/2023', '02/07/2023',
				'13/08/2023', '07/9/2023', '12/10/2023', '15/10/2023', '17/10/2023', '28/10/2023', '02/11/2023', '15/11/2023', '20/11/2023', '08/12/2023', '25/12/2023'
			];

			const filtro = i => i != DatasFiltrar;

         	console.log(data_inicio, data_fim);
			

			function zeroFill(n) {
			return n < 9 ? `0${n}` : `${n}`;
			}

			function formatDate(date) {
			const d = zeroFill(date.getDate());
			const mo = zeroFill(date.getMonth() + 1);
			const y = zeroFill(date.getFullYear());
			const h = zeroFill(date.getHours());
			const mi = zeroFill(date.getMinutes());
			const s = zeroFill(date.getSeconds());

			return `${d}/${mo}/${y}`;
			}

			var dataFormat = new Date(data_inicio);
			dataFormat.setDate(dataFormat.getDate() + 1);
			console.log(dataFormat);

			var dataFormat1 = new Date(data_fim);
			dataFormat1.setDate(dataFormat1.getDate() + 1);
			console.log(dataFormat1);

			var i = 1
			var dataFormat3 = new Date(dataFormat);
			data = formatDate(dataFormat3);
			let arrayDatas = [];
			arrayDatas[0]= data;
			while(dataFormat3 < dataFormat1){
				dataFormat3.setDate(dataFormat3.getDate() + 1);
				data = formatDate(dataFormat3);
				arrayDatas[i] = data;
				i++
			}
			console.log(arrayDatas)

				let novo = arrayDatas.filter((elem) => {
					if ((DatasFiltrar[0] != elem) && (DatasFiltrar[1] != elem) && (DatasFiltrar[2] != elem) && (DatasFiltrar[3] != elem) 
					&& (DatasFiltrar[4] != elem) && (DatasFiltrar[5] != elem) && (DatasFiltrar[6] != elem) && (DatasFiltrar[7] != elem)
					&& (DatasFiltrar[8] != elem) && (DatasFiltrar[9] != elem) && (DatasFiltrar[10] != elem)&& (DatasFiltrar[11] != elem)
					&& (DatasFiltrar[12] != elem)&& (DatasFiltrar[13] != elem)&& (DatasFiltrar[14] != elem)&& (DatasFiltrar[15] != elem)
					&& (DatasFiltrar[16] != elem)&& (DatasFiltrar[17] != elem)&& (DatasFiltrar[18] != elem)&& (DatasFiltrar[19] != elem)
					&& (DatasFiltrar[20] != elem)&& (DatasFiltrar[21] != elem)&& (DatasFiltrar[22] != elem)&& (DatasFiltrar[22] != elem)
					&& (DatasFiltrar[23] != elem)&& (DatasFiltrar[24] != elem)&& (DatasFiltrar[25] != elem)&& (DatasFiltrar[26] != elem)
					&& (DatasFiltrar[27] != elem)&& (DatasFiltrar[27] != elem)&& (DatasFiltrar[29] != elem)&& (DatasFiltrar[30] != elem)
					&& (DatasFiltrar[31] != elem)&& (DatasFiltrar[32] != elem)&& (DatasFiltrar[33] != elem)&& (DatasFiltrar[34] != elem)
					&& (DatasFiltrar[35] != elem)&& (DatasFiltrar[36] != elem)&& (DatasFiltrar[37] != elem)&& (DatasFiltrar[38] != elem)
					&& (DatasFiltrar[39] != elem)&& (DatasFiltrar[40] != elem)){
						return data = formatDate(dataFormat3);
					}
				});
				i ++;
				document.querySelector("[name='array']").value = novo;
				document.getElementById("data0").innerHTML = novo;
				console.log(arrayDatas);

      	});

	</script>
    
</body>
</html>