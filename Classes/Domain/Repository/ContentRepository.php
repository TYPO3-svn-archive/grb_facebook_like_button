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
 * Repository for Tx_GrbMobilegallery_Domain_Model_Content
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
 
class Tx_GrbFacebookLikeButton_Domain_Repository_ContentRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * FindAllContentElementsWithImages
	 * @param int $pid pid
	 * @param int $colPos colPos
	 */
	public function findAllContentElementsWithImagesByPid($pid,$colPos){
		$query = $this->createQuery();
		
		// Delete the Storage-Folder definition.
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		
		$query->matching(
			$query->logicalAnd(
				$query->logicalOr(
					$query->equals('type', 'image'),
					$query->equals('type', 'textpic')			
				),
				$query->logicalAnd(
					$query->equals('pid',$pid),
					$query->equals('colPos',$colPos)					
				)
			)			
		);

    	$result = $query->execute();
        return $result;
	}
	
	/**
	 * FindAllContentElementsWithBodytext
	 * @param int $pid pid
	 * @param int $colPos colPos
	 */
	public function findAllContentElementsWithBodytextByPid($pid,$colPos){
		$query = $this->createQuery();
		
		// Delete the Storage-Folder definition.
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		
		$query->matching(
			$query->logicalAnd(
				$query->logicalOr(
					$query->equals('type', 'text'),
					$query->equals('type', 'textpic')			
				),
				$query->logicalAnd(
					$query->equals('pid',$pid),
					$query->equals('colPos',$colPos)						
				)
			)			
		);

    	$result = $query->execute();
        return $result;
	}	
}
?>