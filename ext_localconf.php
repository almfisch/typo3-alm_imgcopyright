<?php
defined('TYPO3') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:alm_imgcopyright/Configuration/TypoScript/constants.typoscript">');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:alm_imgcopyright/Configuration/TypoScript/setup.typoscript">');


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'AlmImgcopyright',
	'Imglist',
	array(
		\Alm\AlmImgcopyright\Controller\ImglistController::class => 'list',
	),
	// non-cacheable actions
	array(
		\Alm\AlmImgcopyright\Controller\ImglistController::class => 'list',
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:alm_imgcopyright/Configuration/TsConfig/Page/Mod/Wizards/NewContentElement.tsconfig">');