<?php
if (!defined('TYPO3')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'AlmImgcopyright',
	'Imglist',
	'Image List',
	'EXT:alm_imgcopyright/Resources/Public/Icons/Extension.png'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['almimgcopyright_imglist'] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['almimgcopyright_imglist'] = 'pages';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('almimgcopyright_imglist', 'FILE:EXT:alm_imgcopyright/Configuration/FlexForms/flexform_imglist.xml');