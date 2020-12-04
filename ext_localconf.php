<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptConstants('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:alm_imgcopyright/Configuration/TypoScript/constants.typoscript">');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:alm_imgcopyright/Configuration/TypoScript/setup.typoscript">');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Alm.alm_imgcopyright',
	'Imglist',
	array(
		'Imglist' => 'listAll,listPage',
	),
	// non-cacheable actions
	array(
		'Imglist' => 'listAll,listPage',
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:alm_imgcopyright/Configuration/TsConfig/Page/Mod/Wizards/NewContentElement.tsconfig">');