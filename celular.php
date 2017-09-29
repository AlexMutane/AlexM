

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">
	$(function(){
		$('input[name=telefone]').mask("80 00 00 000");	

		$('input[name=telefonemz]').mask("+258 80 00 00 000");			
	});
</script>


<br/>

<p> Telefone: <input type="tel" name="telefone" /> </p>
<p> Telefone (+258): <input type="tel" name="telefonemz" /> </p>
