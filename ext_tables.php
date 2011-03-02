<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');


Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Facebook Like Button'
);

//$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi1.xml');





t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Facebook Like Button');




t3lib_extMgm::addLLrefForTCAdescr('tx_grbfacebooklikebutton_domain_model_likebutton', 'EXT:grb_facebook_like_button/Resources/Private/Language/locallang_csh_tx_grbfacebooklikebutton_domain_model_likebutton.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_grbfacebooklikebutton_domain_model_likebutton');
$TCA['tx_grbfacebooklikebutton_domain_model_likebutton'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:grb_facebook_like_button/Resources/Private/Language/locallang_db.xml:tx_grbfacebooklikebutton_domain_model_likebutton',
		'label' 			=> 'uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/LikeButton.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_grbfacebooklikebutton_domain_model_likebutton.gif'
	)
);


?>