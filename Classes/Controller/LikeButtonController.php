<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Juerg Langhard <langhard@greenbanana.ch>, GreenBanana GmbH
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
 * Controller for the LikeButton object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_GrbFacebookLikeButton_Controller_LikeButtonController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * 
	 * Facebook OG-Data
	 * @var Array;
	 */
	protected $og;
	
	/**
	 * 
	 * Facebook Button-Data
	 * @var Array;
	 */
	protected $buttonValue;	
		
	/**
	 * storagePid
	 * @var Int
	 */
	protected $storagePid = NULL;		
	
	/**
	 * 
	 * Enter description here ...
	 * @var Tx_GrbFacebookLikeButton_Domain_Repository_ContentRepository
	 */
	protected $contentRepository;
	
	/**
	 * 
	 * Enter description here ...
	 * @var Tx_GrbFacebookLikeButton_Domain_Repository_NewsRepository
	 */
	protected $newsRepository;	
	
	
	/**
	 * Initializes the current action
	 * @return void
	 */
	protected function initializeAction() {
		
		$this->contentRepository 	= t3lib_div::makeInstance('Tx_GrbFacebookLikeButton_Domain_Repository_ContentRepository');
		$this->newsRepository 		= t3lib_div::makeInstance('Tx_GrbFacebookLikeButton_Domain_Repository_NewsRepository');

		$currentUrl = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		
		$this->og['title'] 					= $GLOBALS['TSFE']->page['title'];
		$this->og['type'] 					= $this->settings['og']['type'];
		$this->og['url'] 					= $currentUrl;
		$this->og['image'] 					= $this->settings['og']['image'];
		$this->og['siteName'] 				= $this->settings['og']['siteName'];
		$this->og['adminFacebookId']		= $this->settings['og']['adminFacebookId'];
		$this->og['description'] 			= $this->settings['og']['description'];
		
		$this->buttonValue['href']			= $currentUrl;
		$this->buttonValue['layout'] 		= $this->settings['buttonValue']['layout'];
		$this->buttonValue['showFaces'] 	= $this->settings['buttonValue']['showFaces'];
		$this->buttonValue['width'] 		= $this->settings['buttonValue']['width'];
		$this->buttonValue['action'] 		= $this->settings['buttonValue']['action'];
		$this->buttonValue['font'] 			= $this->settings['buttonValue']['font'];
		$this->buttonValue['colorscheme'] 	= $this->settings['buttonValue']['colorscheme'];
		
		// Get pid, if the button is on a normal site
		if($this->storagePid == NULL){
			$this->storagePid = $GLOBALS["TSFE"]->id;
		}			
	}	
	
	/**
	 * Displays LikeButton
	 *
	 * @return string The rendered view
	 */
	public function showAction() {
		
		// NORMAL SITES
		// -----------------------------------------------------------
		
		// Get Image
		$contentElementsWithImages = $this->contentRepository->findAllContentElementsWithImagesByPid($this->storagePid,$this->settings['colPos']);
		$images = array();		
		foreach ($contentElementsWithImages as $element){
			foreach ($element->getImages() as $image){
				$images[] = $image;
			}			
		}		
		if(isset($images[0])){
			$this->og['image'] = 'http://'.$_SERVER["SERVER_NAME"].'/uploads/pics/'.$images[0];
		}
		
		// Get Text
		$contentElementsWithBodytext = $this->contentRepository->findAllContentElementsWithBodytextByPid($this->storagePid,$this->settings['colPos']);
		$bodytexts = array();		
		foreach ($contentElementsWithBodytext as $element){
			$bodytexts[] = $element->getBodytext();
		}			

		foreach ($bodytexts as $bodytext){
			if(isset($bodytext)){
				$this->og['description'] = strip_tags($bodytext);
				break;	
			}
		}
		
		// NEWS SITES (TT_NEWS)
		// -----------------------------------------------------------		
		
		$tx_ttnews = t3lib_div::_GP('tx_ttnews');
		if(isset($tx_ttnews['tt_news'])){
			$newsPost = $this->newsRepository->findByUid($tx_ttnews['tt_news']);
			$newsImages = $newsPost->getImages();
			
			// Get Image
			if(isset($newsImages[0])){
				$this->og['image'] = 'http://'.$_SERVER["SERVER_NAME"].'/uploads/pics/'.$newsImages[0];
			}	
			
			// Get Text
			$newsShort = $newsPost->getShort();	
			if(isset($newsShort)){
				$this->og['description'] = $newsPost->getShort();	
			}else{
				$this->og['description'] = $newsPost->getBodytext();
			}
		}	
		
		$GLOBALS['TSFE']->additionalHeaderData[$this->extensionName ] = '
			<meta property="og:title" content="'.$this->og['title'].'"/>
    		<meta property="og:type" content="'.$this->og['type'].'"/>
    		<meta property="og:url" content="'.$this->og['url'].'"/>
    		<meta property="og:image" content="'.$this->og['image'].'"/>
    		<meta property="og:site_name" content="'.$this->og['siteName'].'"/>
    		<meta property="fb:admins" content="'.$this->og['adminFacebookId'].'"/>
    		<meta property="og:description" content="'.$this->og['description'].'"/>
		';		
		
		if($_GET['debug']==1){
			t3lib_div::debug($this->extensionName );
		}
		$this->view->assign('buttonValue', $this->buttonValue);
	}
	
}
?>