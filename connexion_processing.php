<?php
	
	function secure_input($string, $db) {
		$string = mysqli_real_escape_string($db, $string);
        $string = addcslashes($string, '%_');
        return $string;
    }

	$isOk = true;

	$db_connect = mysqli_connect("localhost", "toto", "totopwd", "db_clecoq001");
	if (!$db_connect) {
		#echo "Connot connect to mysql server";
		$isOk =  false;
	};
