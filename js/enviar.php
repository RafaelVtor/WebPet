<?php 
	require 'vendor/autoload.php';

	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("rafaelvitor_as@hotmail.com");
	$email->setSubject("testando");
	$email->addTo("rafaelvitor_as@hotmail.com");
	$email->addContent("Mais um teste");
	$email->addContent(
	    "text/html", "<strong><br><br>Mais outro teste</strong>"
	);
	$sendgrid = new \SendGrid(getenv('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'));
	try {
	    $response = $sendgrid->send($email);
	    print $response->statusCode() . "\n";
	    print_r($response->headers());
	    print $response->body() . "\n";
	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
 ?>