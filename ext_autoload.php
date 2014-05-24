<?php
$extensionClassesPath = t3lib_extMgm::extPath('extbase_rest', 'Classes/');

return array(
	'tx_extbaserest_controller_dummycontroller' => $extensionClassesPath . 'Controller/DummyController.php',
	'tx_extbaserest_core_bootstrap' => $extensionClassesPath . 'Core/Bootstrap.php',
	'tx_extbaserest_hook_frontendrequestpreprocessor' => $extensionClassesPath . 'Hook/FrontendRequestPreProcessor.php',
	'tx_extbaserest_utility_frontendutility' => $extensionClassesPath . 'Utility/FrontendUtility.php',
	'tx_extbaserest_router' => $extensionClassesPath . 'Router.php'
);