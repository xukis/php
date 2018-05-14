<?php 

require_once("config.php");

echo session_save_path();

echo "<br>";

var_dump(session_status());

echo "<br>";

switch (session_status()) {
	case PHP_SESSION_DISABLED:
		echo "As sessões estão desabilitadas.";
		break;
	
	case PHP_SESSION_NONE:
		echo "As sessões estão habilitadas, mas não existe nenhuma.";
		break;

	case PHP_SESSION_ACTIVE:
		echo "As sessões estão habilitadas. Existe uma sessão. ";
		echo session_id();
		break;
}

 ?>