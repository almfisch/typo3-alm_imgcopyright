<?php

class imglist_wizicon
{
	/**
    * Processing the wizard items array
    *
    * @param array $wizardItems The wizard items
    * @return array Modified array with wizard items
    */
    function proc($wizardItems)
    {
    	$wizardItems['plugins_tx_imgcopyright'] = array(
        	'iconIdentifier' => 'plugins_tx_imgcopyright_icon',
            'title' => $GLOBALS['LANG']->sL('LLL:EXT:alm_imgcopyright/Resources/Private/Language/locallang_db.xlf:tx_almimgcopyright_imglist_title'),
            'description' => $GLOBALS['LANG']->sL('LLL:EXT:alm_imgcopyright/Resources/Private/Language/locallang_db.xlf:tx_almimgcopyright_imglist_description'),
            'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=almimgcopyright_imglist'
        );

        return $wizardItems;
    }
}

?>
