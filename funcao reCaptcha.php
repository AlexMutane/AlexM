<?php	
	
	function reCaptcha($setSecret, $methodToExecute){
		
		$secret = $setSecret;
		$response = $_POST['g-recaptcha-response'];
		$remoteip = $_SERVER["REMOTE_ADDR"];
		
		$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
		
		$result = json_decode($url, TRUE);
		
		if($result['success'] == 1){
			$methodToExecute;
		}
	}
	
	/* Pra chamar a funcao:
	* reCaptcha(código "Secret key" do google, função que deve ser executada em caso de sucesso)
	* colocar a div com "Site key" no formulário conforme dada no google;
	*/
	
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!--
<form method="post">
	<p> <input type="text" name="nome" /> </p>
	<div class="g-recaptcha" data-sitekey="6LfJRjIUAAAAADaDE41t8Y4andx2Dp1ISJQ7CGA9"></div>
	<p> <input type="submit" name="submit"/> </p>
</form>
-->
<!--
A Div que está no parágrafo já vem dada no GoogleRecaptcha. é só copiar de lá e colar no formulário.
Colocando onde deseja que o recaptcha esteja, geralmente no final do formulário
-->
