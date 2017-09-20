<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/*
$tempColumns = array(
	'tx_almimgcopyright_name' => array(
    	'exclude' => 1,
    	'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'LLL:EXT:alm_imgcopyright/Resources/Private/Language/locallang_db.xlf:tx_almimgcopyright_name',
        'config' => array(
        	'type' => 'input',
        	'mode' => 'useOrOverridePlaceholder',
        	'placeholder' => '__row|uid_local|metadata|tx_almimgcopyright_name',
        	'size' => '20',
        	'max' => '255',
        	'eval' => 'null',
        	'default' => null,
        )
    ),
    'tx_almimgcopyright_link' => array(
    	'exclude' => 1,
    	'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'LLL:EXT:alm_imgcopyright/Resources/Private/Language/locallang_db.xlf:tx_almimgcopyright_link',
        'config' => array(
        	'type' => 'input',
        	'mode' => 'useOrOverridePlaceholder',
        	'placeholder' => '__row|uid_local|metadata|tx_almimgcopyright_link',
        	'size' => '20',
        	'max' => '255',
        	'eval' => 'null',
        	'default' => null,
        )
    ),
    'tx_almimgcopyright_exlist' => array(
    	'exclude' => 1,
    	'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'LLL:EXT:alm_imgcopyright/Resources/Private/Language/locallang_db.xlf:tx_almimgcopyright_exlist',
        'config' => array(
        	'type' => 'check',
        	'mode' => 'useOrOverridePlaceholder',
        	'placeholder' => '__row|uid_local|metadata|tx_almimgcopyright_exlist',
        	'items' => [
            	'1' => [
                	'0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                ]
            ]
        )
    ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file_reference', $tempColumns, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('sys_file_reference', '--linebreak--,tx_almimgcopyright_name,tx_almimgcopyright_link, tx_almimgcopyright_exlist,--linebreak--', '', 'after:description');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('sys_file_reference', 'imageoverlayPalette', '--linebreak--,tx_almimgcopyright_name,tx_almimgcopyright_link, tx_almimgcopyright_exlist,--linebreak--', 'after:description');
*/
