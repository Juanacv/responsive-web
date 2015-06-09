<?php
	$DB_SERVER = "localhost";
	$DB_USER = "root";
	$DB_USER_PASSWORD = "12345";
	$DB_NAME = "users";
	$user = $_POST["user"];
	$password = $_POST["password"];
	/* url de la página de login con éxito */
	$tmpArr= explode("/",$_SERVER["HTTP_REFERER"]); //cogemos la url del servidor
	$size = sizeof($tmpArr) - 1;
	$url = "";
	for ($i=0; $i < $size; $i++) {
		if ($i > 0) {
			$url = $url."/".$tmpArr[$i];
		}
		else {
			$url = $tmpArr[$i];
		}
	}
	$url = $url."/success.html";
	//conexión a base de datos
	$db = new mysqli($DB_SERVER, $DB_USER, $DB_USER_PASSWORD, $DB_NAME);
	
	/* comprobar la conexión */
	if ($db->connect_error) {
	    header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die();
	}
	//buscamos al usuario que ha hecho login
	$query = "SELECT name FROM login_information WHERE name = ? AND pass = ?";
	$stmt = $db->prepare($query);
	if($stmt === false) {
	    header('HTTP/1.1 500 '.$db->error);
        header('Content-Type: application/json; charset=UTF-8');
        die();
	}
	$stmt->bind_param('ss', $user, $password);
	$stmt->execute();
	$stmt->bind_result($userdb);
	$stmt->fetch();
	if ($user == $userdb) { //si todo es correcto, redirección
		$stmt->close();
		$db->close();
	    header('HTTP/1.1 200 Ok');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode($url));
	}
	else { //envío de error en otro caso
		$stmt->close();
		$db->close();
	    header('HTTP/1.1 500 Internal Server Chewaka');
        header('Content-Type: application/json; charset=UTF-8');
        die();
	}
?>
	