<?php

########################################################################
# Extension Manager/Repository config file for ext "grb_facebook_like_button".
#
# Auto generated 28-02-2011 08:34
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Facebook Like Button',
	'description' => '',
	'category' => 'plugin',
	'author' => 'Juerg Langhard',
	'author_email' => 'langhard@greenbanana.ch',
	'author_company' => 'GreenBanana GmbH',
	'shy' => '',
	'dependencies' => 'cms,extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.0.3',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'extbase' => '',
			'fluid' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:24:{s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"6a83";s:14:"ext_tables.php";s:4:"e608";s:14:"ext_tables.sql";s:4:"d41d";s:16:"kickstarter.json";s:4:"62c1";s:43:"Classes/Controller/LikeButtonController.php";s:4:"3aee";s:32:"Classes/Domain/Model/Content.php";s:4:"5997";s:47:"Classes/Domain/Repository/ContentRepository.php";s:4:"ca34";s:39:"Configuration/Kickstarter/settings.yaml";s:4:"035f";s:32:"Configuration/TCA/LikeButton.php";s:4:"5b44";s:38:"Configuration/TypoScript/constants.txt";s:4:"987c";s:34:"Configuration/TypoScript/setup.txt";s:4:"fab4";s:40:"Resources/Private/Language/locallang.xml";s:4:"b674";s:93:"Resources/Private/Language/locallang_csh_tx_grbfacebooklikebutton_domain_model_likebutton.xml";s:4:"18d3";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"512b";s:38:"Resources/Private/Layouts/Default.html";s:4:"b982";s:42:"Resources/Private/Partials/formErrors.html";s:4:"f5bc";s:53:"Resources/Private/Partials/LikeButton/properties.html";s:4:"5b44";s:48:"Resources/Private/Templates/LikeButton/Show.html";s:4:"1cd6";s:49:"Resources/Public/CSS/grb_facebook_like_button.css";s:4:"78ba";s:34:"Resources/Public/Icons/ogImage.png";s:4:"ef4f";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:75:"Resources/Public/Icons/tx_grbfacebooklikebutton_domain_model_likebutton.gif";s:4:"1103";s:37:"Tests/Domain/Model/LikeButtonTest.php";s:4:"22f4";}',
);

?>