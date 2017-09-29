
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>



<script type="text/javascript">
$(function(){
	//definir os selecotres
	var data1 = $('input[name=data1]');
	var data2 = $('input[name=data2]');
	
	//Adiciona o STYLE dos campos 'red' e a mensagem de erro. a linha 14 evita a multiplicacao da msg de erro.
	$('input[name^=data]').focus(function(){ $('*').removeClass('errodata'); $('span').hide(); });
	$('input[type=submit]').focus(function(){ $('span').hide(); });

	//campo que no FOCUS ativa a validacao dos outros
	$('#other').focus(function(){
		
		if(data2.val() < data1.val()){
			$(data2).after('<span class="errodata">data 2 must be greater than 1</span>');
			$(data2).addClass('errodata');
			$(data1).addClass('errodata');
		}
		
	});
});
//Logo abaixo, o estilo da classe Erro.
</script>

<style type="text/css">
	.errodata{ color: red;}
</style>

	<form>
		<p> Data 1. <input type="date" name="data1" /> </p>
		<p> Data 2. <input type="date" name="data2" /> </p>
		<p> Escreva: <input type="text" name="nome" id="other" required="required" /> </p>
		<p><input type="submit" /></p>
	</form>