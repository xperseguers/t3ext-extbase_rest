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

class Tx_ExtbaseRest_Utility_FrontendUtility {

	/**
	 * @var tslib_fe
	 */
	protected static $tsfeBackup;

	/**
	 * @return void
	 */
	public static function startSimulation() {
		self::$tsfeBackup = $GLOBALS['TSFE'];

		$GLOBALS['TSFE'] = t3lib_div::makeInstance('tslib_fe', $GLOBALS['TYPO3_CONF_VARS'], 0, 0);
		$GLOBALS['TSFE']->initFEuser();
		$GLOBALS['TSFE']->determineId();
		$GLOBALS['TSFE']->getCompressedTCarray();
		$GLOBALS['TSFE']->initTemplate();
		$GLOBALS['TSFE']->getConfigArray();
		$GLOBALS['TSFE']->convPOSTCharset();
		$GLOBALS['TSFE']->settingLanguage();
		$GLOBALS['TSFE']->settingLocale();
	}

	/**
	 * @return void
	 */
	public static function stopSimulation() {
		$GLOBALS['TSFE'] = self::$tsfeBackup;
	}

} 