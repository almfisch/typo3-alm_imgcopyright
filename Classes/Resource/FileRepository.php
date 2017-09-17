<?php
namespace Alm\AlmImgcopyright\Resource;

class FileRepository extends \TYPO3\CMS\Core\Resource\FileRepository
{
	public function findAllByRelation($tableNames, $fieldNames, $extensions)
    {
        $itemList = [];
        $referenceUids = null;
        $fileUids = null;
        if ($this->getEnvironmentMode() === 'FE' && !empty($GLOBALS['TSFE']->sys_page)) {
            $frontendController = $GLOBALS['TSFE'];
            $references = $this->getDatabaseConnection()->exec_SELECTgetRows(
                'uid, uid_local',
                'sys_file_reference',
                'tablenames IN (' . implode(',', $this->getDatabaseConnection()->fullQuoteArray($tableNames, 'sys_file_reference')) . ')' .
                    ' AND fieldname IN (' . implode(',', $this->getDatabaseConnection()->fullQuoteArray($fieldNames, 'sys_file_reference')) . ') '
                    . $frontendController->sys_page->enableFields('sys_file_reference', $frontendController->showHiddenRecords),
                '',
                'sorting_foreign',
                '',
                'uid'
            );
            if (!empty($references)) {
            	$referencesUnique = [];
            	foreach($references as $reference)
            	{
            		$referencesUnique[$reference['uid_local']] = $reference['uid'];
            	}
            	$references = $referencesUnique;
            	$references = array_flip($references);
                $referenceUids = array_keys($references);
                $fileUids = array_values($references);
            }
        }

        if (!empty($referenceUids)) {
            foreach ($referenceUids as $referenceUid) {
                try {
                	$fileReferenceObject = $this->factory->getFileReferenceObject($referenceUid);
                	$fileExtension = $fileReferenceObject->getExtension();
                	if(in_array($fileExtension, $extensions) && $fileReferenceObject->isMissing() === false && file_exists($fileReferenceObject->getPublicUrl()) === true)
            		{
                    	$itemList[] = $fileReferenceObject;
                    }
                } catch (ResourceDoesNotExistException $exception) {
                }
            }
        }

        return $itemList;
    }
    
    
    public function findAllByPage($pid, $tableNames, $fieldNames, $extensions)
    {
        $itemList = [];
        $referenceUids = null;
        $fileUids = null;
        if ($this->getEnvironmentMode() === 'FE' && !empty($GLOBALS['TSFE']->sys_page)) {
            $frontendController = $GLOBALS['TSFE'];
            $references = $this->getDatabaseConnection()->exec_SELECTgetRows(
                'uid, uid_local',
                'sys_file_reference',
                'pid = ' . (int)$pid .
                	' AND tablenames IN (' . implode(',', $this->getDatabaseConnection()->fullQuoteArray($tableNames, 'sys_file_reference')) . ')' .
                    ' AND fieldname IN (' . implode(',', $this->getDatabaseConnection()->fullQuoteArray($fieldNames, 'sys_file_reference')) . ') '
                    . $frontendController->sys_page->enableFields('sys_file_reference', $frontendController->showHiddenRecords),
                '',
                'sorting_foreign',
                '',
                'uid'
            );
            if (!empty($references)) {
            	$referencesUnique = [];
            	foreach($references as $reference)
            	{
            		$referencesUnique[$reference['uid_local']] = $reference['uid'];
            	}
            	$references = $referencesUnique;
            	$references = array_flip($references);
                $referenceUids = array_keys($references);
                $fileUids = array_values($references);
            }
        }

        if (!empty($referenceUids)) {
            foreach ($referenceUids as $referenceUid) {
                try {
                	$fileReferenceObject = $this->factory->getFileReferenceObject($referenceUid);
                	$fileExtension = $fileReferenceObject->getExtension();
                	if(in_array($fileExtension, $extensions) && $fileReferenceObject->isMissing() === false && file_exists($fileReferenceObject->getPublicUrl()) === true)
            		{
                    	$itemList[] = $fileReferenceObject;
                    }
                } catch (ResourceDoesNotExistException $exception) {
                }
            }
        }

        return $itemList;
    }
}