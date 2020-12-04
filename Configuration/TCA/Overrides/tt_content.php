<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'alm_imgcopyright',
	'Imglist',
	'Image List',
	'EXT:alm_imgcopyright/Resources/Public/Icons/Extension.png'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['almimgcopyright_imglist'] = 'pages';
