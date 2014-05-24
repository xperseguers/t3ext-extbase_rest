<?php
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/index_ts.php']['preprocessRequest'][] =
	'Tx_ExtbaseRest_Hook_FrontendRequestPreProcessor->mapRestRequestToEid';

$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['Tx_ExtbaseRest_Router'] =
	t3lib_extMgm::extPath('extbase_rest', 'Resources/Private/PHP/Router.php');

t3lib_extMgm::addTypoScript('extbase_rest', 'setup', '
config.tx_extbase {
	mvc {
		requestHandlers {
			Tx_ExtbaseRest_Mvc_Web_RestRequestHandler = Tx_ExtbaseRest_Mvc_Web_RestRequestHandler
		}
	}
}
', 43);

Tx_Extbase_Utility_Extension::configurePlugin(
	'ExtbaseRest',
	'Example',
	array(
		'Dummy' => 'index,show'
	)
);