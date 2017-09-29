
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>


<script type="text/javascript">
$(function(){
	$('input[name=data1], input[name=data2]').datepicker({
    	dateFormat: 'dd/mm/yy',
    	dayNamesMin: ['D','S','T','Q','Q','S','S'],
    	dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
    	monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro'],
    	monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    });
	//definir os selecotres
	var data1 = $('input[name=data1]');
	var data2 = $('input[name=data2]');
	
	//Adiciona o STYLE dos campos 'red' e a mensagem de erro. a linha 14 evita a multiplicacao da msg de erro.
	$('input[name^=data]').focus(function(){ $('*').removeClass('errodata'); $('#errodata').text(''); });
	$('input[type=submit]').focus(function(){ $('#errodata').hide(); });

	//campo que no FOCUS ativa a validacao doshttps://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css outros
	$('#other').focus(function(){
		$('#errodata').text('');

		if(data2.val() <= data1.val()){
			$(data2).after('<span id="errodata">data 2 must be greater than 1</span>');
			$(data2).addClass('errodata');
			$(data1).addClass('errodata');
		}
		
	});
});
//Logo abaixo, o estilo da classe Erro.
</script>

<style type="text/css">
	.errodata{ color: red;}
	#errodata{ color: red;}
</style>

	<form>
		<p> Data 1. <input type="text" name="data1" /> </p>
		<p> Data 2. <input type="text" name="data2" /> </p>
		<p> Escreva: <input type="text" name="nome" id="other" required="required" /> </p>
		<p><input type="submit" /></p>
	</form>
