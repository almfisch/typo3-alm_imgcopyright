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
    'tx_almimgcopyright_exlist' => array(
        'label' => 'LLL:EXT:alm_imgcopyright/Resources/Private/Language/locallang_db.xlf:tx_almimgcopyright_exlist',
        'config' => array(
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                '1' => [
                    '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                ]
            ]
        )
    ),
    'tx_almimgcopyright_inlist' => array(
        'label' => 'LLL:EXT:alm_imgcopyright/Resources/Private/Language/locallang_db.xlf:tx_almimgcopyright_inlist',
        'config' => array(
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                '1' => [
                    '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                ]
            ]
        )
    ),
    );

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file_metadata', $tempColumns, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('sys_file_metadata', 'tx_almimgcopyright_name, tx_almimgcopyright_link, tx_almimgcopyright_exlist, tx_almimgcopyright_inlist', '', 'after:title');
