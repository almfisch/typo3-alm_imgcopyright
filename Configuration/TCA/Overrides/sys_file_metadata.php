<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$tempColumns = array(
	'tx_almimgcopyright_name' => array(
        'label' => 'LLL:EXT:alm_imgcopyright/Resources/Private/Language/locallang_db.xlf:tx_almimgcopyright_name',
        'config' => array(
        	'type' => 'input',
        	'size' => '30',
        	'max' => '255',
        )
    ),
    'tx_almimgcopyright_link' => array(
        'label' => 'LLL:EXT:alm_imgcopyright/Resources/Private/Language/locallang_db.xlf:tx_almimgcopyright_link',
        'config' => array(
        	'type' => 'input',
        	'size' => '30',
        	'max' => '255',
        )
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file_metadata', $tempColumns, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('sys_file_metadata', 'tx_almimgcopyright_name, tx_almimgcopyright_link', '', 'after:alternative');
