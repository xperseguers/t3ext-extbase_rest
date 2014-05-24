<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Arno Schoon <arno@maxserv.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class Tx_ExtbaseRest_Router {

	/**
	 * @var string
	 */
	const PLUGIN_NAMESPACE_PATTERN = '/\/_rest\/([^\/]+)\//i';

	/**
	 * @var string
	 */
	const CONTROLLER_FORMAT_PATTERN = '/\/_rest\/[^\/]+\/([^\.]+)\.([a-z0-9]+)/i';

	/**
	 * @var Tx_Extbase_Object_ObjectManager
	 */
	protected $objectManager;

	/**
	 * @param string $requestUri
	 *
	 * @return string|null
	 */
	public function dispatch($requestUri) {
		$configuration = array();
		$response = NULL;
		$match = NULL;

		if (preg_match(self::PLUGIN_NAMESPACE_PATTERN, $requestUri, $match) === 1) {
			Tx_ExtbaseRest_Utility_FrontendUtility::startSimulation();

			/** @var Tx_Extbase_Object_ObjectManager objectManager */
			$this->objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');

			/** @var Tx_ExtbaseRest_Core_Bootstrap $bootstrap */
			$bootstrap = $this->objectManager->create('Tx_ExtbaseRest_Core_Bootstrap');

			$namespaceParts = explode('.', $match[1]);

			if(count($namespaceParts) == 3) {
				$configuration['vendorName'] = t3lib_div::underscoredToUpperCamelCase($namespaceParts[0]);
				$configuration['extensionName'] = t3lib_div::underscoredToUpperCamelCase($namespaceParts[1]);
				$configuration['pluginName'] = t3lib_div::underscoredToUpperCamelCase($namespaceParts[2]);
			} else {
				$configuration['extensionName'] = t3lib_div::underscoredToUpperCamelCase($namespaceParts[0]);
				$configuration['pluginName'] = t3lib_div::underscoredToUpperCamelCase($namespaceParts[1]);
			}

			$response = $bootstrap->run('', $configuration);

			Tx_ExtbaseRest_Utility_FrontendUtility::stopSimulation();
		} else {
			header(t3lib_utility_Http::HTTP_STATUS_400);
		}

		return $response;
	}

} 