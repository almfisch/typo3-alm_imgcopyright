<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['almimgcopyright_imglist'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('almimgcopyright_imglist', 'FILE:EXT:alm_imgcopyright/Configuration/FlexForms/flexform_imglist.xml');

if (TYPO3_MODE == 'BE')
{
	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Core\Imaging\IconRegistry');
    $iconRegistry->registerIcon(
        'tx_alm_imgcopyright_icon',
        'TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider',
        ['source' => 'EXT:alm_imgcopyright/Resources/Public/Icons/Extension.png']
    );
}