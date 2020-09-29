<?php

	date_default_timezone_set('Asia/Manila');
	// $date = date('m-d-Y h:i A');

	/* google cloud sql */	
	$servername = '35.187.255.212';
	$username 	= 'root';
	$password 	= '44/66.72+4466272';
	$database 	= 'postalcodecomph';

	/* Create connection */
	$conn = new mysqli($servername, $username, $password, $database);

	/* Check connection */
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

    # starts session
    session_start();

    # configure constants
    $directory          = realpath(dirname(__FILE__));
    $document_root      = realpath($_SERVER['DOCUMENT_ROOT']);
    $base_url           = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'];
    $actual_link        = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($directory, $document_root)===0) {
        $base_url       .= str_replace(DIRECTORY_SEPARATOR, '/', substr($directory, strlen($document_root)));
    }

    defined("APP_URL")  ? null : define("APP_URL", str_replace("/settings", "", $base_url));
    defined("FULL_URL") ? null : define("FULL_URL", $actual_link );

    # Assets URL, location of your css, img, js, etc. files
    defined("ASSETS_URL") ? null : define("ASSETS_URL", APP_URL);


	$query = "SELECT 
		`ID`,
		`URL`,
        `PRIORITY`,
		`LAST_MOD`
	FROM 
        `SITEMAP_LIST`";

	$sitemap_arr         = [];

	$sql = $conn->prepare($query);

	/* execute query */
	if (!$sql->execute()) {
		echo "Execute failed: (" . $sql->errno . ") " . $sql->error; 
		exit;
	}

	/* bind results  */
	$sql->bind_result(
		$id,
        $url,
        $priority,
		$last_mod
	);

	/* fetch value */
	while ( $sql->fetch()) {
        
        $xml_datetime = new  DateTime($last_mod);

		$sitemap_arr[] = array(
			'ID'                => $id,
            'URL'               => $text=preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $url),
            'PRIORITY'          => $priority,
			'LAST_MOD'          => $xml_datetime->format('c')
		);
		
	}

    /* free results */
    $sql->free_result();

    /* close statement */
    $sql->close();

    // header('Content-Type: application/xml; charset=utf-8');

    echo '<?xml version="1.0" encoding="UTF-8"?>' .  PHP_EOL;
  
    echo '<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

    foreach ($sitemap_arr as $value) {

        echo '<url>' . PHP_EOL;
        echo 	'<loc>' . APP_URL .'/'. $value['URL'] . '</loc>' . PHP_EOL;
        echo '<priority>' . $value['PRIORITY'] . '</priority>' . PHP_EOL;
        echo 	'<lastmod>' . $value['LAST_MOD'] . '</lastmod>' . PHP_EOL;
        echo '</url>' . PHP_EOL;

    }
    
    echo  '</urlset>' . PHP_EOL;

?>