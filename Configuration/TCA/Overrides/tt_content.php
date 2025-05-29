<?php
if (!defined('TYPO3')) {
	die('Access denied.');
}

$pluginSignature = \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'AlmImgcopyright',
	'Imglist',
	'Image List',
	'tx_alm_imgcopyright_icon'
);

/*
$pluginSignature = TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
	'AlmImgcopyright',
	'Imglist',
	'Image List',
	'tx_alm_imgcopyright_icon'
);
*/

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'tt_content',
	'--div--;Plugin,pi_flexform,',
	$pluginSignature,
	'after:subheader',
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'*',
	'FILE:EXT:alm_imgcopyright/Configuration/FlexForms/flexform_imglist.xml',
	$pluginSignature,
);





/*
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['almimgcopyright_imglist'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['almimgcopyright_imglist'] = 'pages';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('almimgcopyright_imglist', 'FILE:EXT:alm_imgcopyright/Configuration/FlexForms/flexform_imglist.xml');
*/