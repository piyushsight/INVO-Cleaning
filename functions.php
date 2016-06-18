<?php
/*
	define("DB_HOST", "localhost");
	define("DB_USER", "homestead");
	define("DB_PASS", "secret");
	define("DB_NAME", "chilledlassi");
	define("DOMAIN", "http://chilledlassi.dev");
*/

	define("DB_HOST", "chilledlassi.db.10464948.hostedresource.com");
	define("DB_USER", "chilledlassi");
	define("DB_PASS", "Alvin@4frnds");
	define("DB_NAME", "chilledlassi");
	define("DOMAIN", "http://chilledlassi.waterkraft.in");


// gplus details
	define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/php/vendor/');
	define('CLIENT_SECRET', "GqUW1ntNusThYNzHyUi2tOGB");
	define('CLIENT_ID', "1077340120455-52ijpum37ac8tcunfjoghofi8qlekmbr.apps.googleusercontent.com");
	define('REDIRECT_URI', DOMAIN."/php/OAuth/receivedGoogleCode.php");

// facebook app details
	// local
	define('FACEBOOK_APPID', '1373651122662016');
	define('FACEBOOK_SECRET', '1689044af5e43eebaabb96af0b5ae994');
	
	// server's
	// define('FACEBOOK_APPID', '566817506832132');
	// define('FACEBOOK_SECRET', '03ace7b23a81da8b6101526f971bae44');	

// paypal app details
	define('PAYPAL_ACCOUNT', 'admin@chilledlassi.dev');
	define('PAYPAL_ID', 'AS3DQfi40hnnwBkWuUvLE9R5O0_m8n2mmvoiZ9AeaHYf6vrYibvKLYPCpiT2wc1jAkmZZUBAwo1-nCqE');
	define('PAYPAL_SECRET', 'EIdUUxRKuYGu2V7q4MbBf4dDtakRDKkgOKLG0PPQS15d5zMONOTKZKt3uoqUN6QAUfQTLB63pEoNz4N_');

	$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS)
		or die('Unable To Connect To Database '.mysql_error());

	$conn = mysql_select_db(DB_NAME)
		or die('Unable To Select Database '.mysql_error());

	session_start();

	function processSql($query) {
		$result = [];

		$mysqlResult = mysql_query($query);
		while ($row = mysql_fetch_assoc($mysqlResult)) {
			$result[] = $row;
		}

		return $result;
	}

	function sanitizeString($var) {
		
		$var = strip_tags($var);
		$var = htmlentities($var);
		$var = stripslashes($var);
		return mysql_real_escape_string($var);
	}

	function detail($var) {

		echo "<pre>";
		var_dump($var);
		die();
	}

	