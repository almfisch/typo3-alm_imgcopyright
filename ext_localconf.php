<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Alm.' . $_EXTKEY,
	'Imglist',
	array(
		'Imglist' => 'listAll,listPage',
	),
	// non-cacheable actions
	array(
		'Imglist' => 'listAll,listPage',
	)
);

?>
