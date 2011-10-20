<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Juerg Langhard <langhard@greenbanana.ch>, GreenBanana GmbH - www.greenbanana.ch
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


/**
 * Content
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_GrbFacebookLikeButton_Domain_Model_News extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * images
	 *
	 * @var string $images
	 */
	protected $images;
	
	/**
	 * short
	 * @var string $short
	 */
	protected $short;
	
	/**
	 * bodytext
	 * @var string $bodytext
	 */
	protected $bodytext;	
	
	/**
	 * colPos
	 * @var string $colPos
	 */
	protected $colPos;			

	/**
	 * Getter for images
	 * @return array images
	 */
	public function getImages() {
		return t3lib_div::trimExplode(',', $this->images);
	}	
	
	/**
	 * Getter for short
	 * @return string short
	 */
	public function getShort() {
		return $this->short;
	}	
		
	/**
	 * Getter for bodytext
	 * @return string bodytext
	 */
	public function getBodytext() {
		return $this->bodytext;
	}		
	
}
?>