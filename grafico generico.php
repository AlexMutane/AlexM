<?php

//BLOCO DO PHP BASE QUE IRÁ GERAR OS GRÁFICOS. NÃO PADRONIZADO.
	
		$pdo = new PDO('mysql:host=localhost; dbname=graficos', 'root', '');
		
		if(!$pdo) die('Bad Conection......');
	
	//arrays que vão receber os valores dos 'projectos', 'pessoas' envolvidas e o 'tempo' de execucao desses projectos (dias)
	//** As variáveis a definir devem ser arrays
	$projecto = array();
	$tempo = array();
	$tecnico = array();
	
	$i = 0; //incializa um contador par o loop /* NÃO TROCAR ESTA LINHA
	
//Bloco do Select e recuperacao de dados da BD
	$sql = "SELECT * FROM projectos";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	
	while($linha = $stmt->fetchObject()){
		$projecto[$i] = $linha->nome;
		$tempo[$i] = $linha->tempo;
		$tecnico[$i] = $linha->pessoas;
		
		$i = $i + 1; //Incrementa o $i para saber quantas Linhas (Resultados) foram selecionadas no total /* NÃO TROCAR ESTA LINHA
	}
//Fim do bloco do select.
?>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
	google.load("visualization", "1", {"packages":["corechart"]});
	google.setOnLoadCallback(desenhaGrafico);
	
	function desenhaGrafico(){
		var data = new google.visualization.DataTable();
		
		//Definição do número de colunas qua irão compor a tabela de valores do GoogleCharts
		//Os nomes abaixo são sujestivos, não seguem nenhum creitério específico.
		data.addColumn('string', 'Projectos');
		data.addColumn('number', 'Dias');
		data.addColumn('number', 'Técnicos');
		
		data.addRows(<?php echo $i; ?>); 	// * NÃO TROCAR ESTA LINHA
		
		<?php
			$k = $i;
			for($i = 0; $i < $k; $i++):
		?>
				data.setValue(<?php echo $i ?>, 0, '<?php echo $projecto[$i] ?>'); //Levou aspas por ser STRING. outros 2 abaixo são NUMBER
				data.setValue(<?php echo $i ?>, 1, <?php echo $tempo[$i] ?>);
				data.setValue(<?php echo $i ?>, 2, <?php echo $tecnico[$i] ?>);
	<?php 	endfor; 
	?>
		
		var chart = new google.visualization.AreaChart(document.getElementById("chart_div"));
		//Outros tipos de 'visualization.' LineChart|AreaChart|PieChart|ColumnChart|BarChart|Histogram
		
		chart.draw(data, options);
		
		var options = {
			title: "Relatório."
		};
	}
</script>

<meta charset="utf-8">

<fieldset> <legend> Gráficos usando GoogleCharts com PHP + MySQL </legend>
	<div id="chart_div" style="width: 430; height:350"></div> <!-- DIV que irá receber o gráfico desenhado. -->
</fieldset>
		
		