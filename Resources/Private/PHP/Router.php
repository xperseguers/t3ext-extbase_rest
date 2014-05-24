<?php
$requestUri = t3lib_div::getIndpEnv('REQUEST_URI');

if (stripos($requestUri, '/_rest/') !== FALSE) {
	/** @var Tx_ExtbaseRest_Router $router */
	$router = t3lib_div::makeInstance('Tx_ExtbaseRest_Router');

	echo $router->dispatch($requestUri);
} else {
	header(t3lib_utility_Http::HTTP_STATUS_400);
}
