<?php
	
function insucesso($text){
	return <<<_END
	<div id="retorno" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body alert-danger"> 
					<button class="close" data-dismiss="modal">&times;</button>
					{$text}
				</div>
			</div>
		</div>
	</div>
_END;
}

function sucesso($text){
	echo <<<_END
	<div id="retorno" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body alert-success"> 
					<button class="close" data-dismiss="modal">&times;</button>
					{$text}
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript"> $(document).ready(function(){ $("#retorno").modal('show'); }); </script>
_END;
}

if(isset($_POST['submit'])):
	echo ($_POST['soma'] == 11)? sucesso("Resposta Correcta. Passe adiante...") : insucesso("Errada a resposta. Volte ao comeco");
endif;
	
?>

<!-- IMPOSTANDO AS BIBLIOTECAS NECESSÁRIAS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript"> $(document).ready(function(){ $("#retorno").modal('show'); }); </script>
<!-- DIV -->

<form method="post" action="">
	<p>A que é igual a soma:  4+7</p>
	<input type="number" name="soma" />
	<button type="submit" name="submit" data-toggle="modal" data-target="#retorno"> Calcular </button>
</form>
