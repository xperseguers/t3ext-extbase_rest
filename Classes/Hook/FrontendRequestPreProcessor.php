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

class Tx_ExtbaseRest_Hook_FrontendRequestPreProcessor {

	/**
	 * Maps a REST request to an eID script.
	 *
	 * @param array $foo
	 * @param array $bar
	 * @return void
	 */
	public function mapRestRequestToEid(array $foo, array $bar) {
		$requestUri = t3lib_div::getIndpEnv('REQUEST_URI');

		if (!isset($_GET['eID']) && stripos($requestUri, '/_rest/') !== FALSE) {
			t3lib_div::_GETset('Tx_ExtbaseRest_Router', 'eID');
		}
	}

}