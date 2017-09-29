<?php


?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(function(){
		$('#base').append('<div id="retorno" class="alert alert-success">Operacao terminada com Sucesso.</div>');
		$('#retorno').fadeOut(4000);
	});
</script>

<style type="text/css">
	#retorno{
		font-size: 20px;
		top: 5%;
		left: 10%;
		width: 70%;
		position: absolute;
		z-index: 1;
	}
	#base{
		background-color: #e3e3e3;
		height: 500px;
		position: relative;
	}
</style>

<div id="base"></div>