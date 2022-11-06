<?php
namespace Alm\AlmImgcopyright\Resource;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Database\Query\Restriction\FrontendRestrictionContainer;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class FileRepository extends \TYPO3\CMS\Core\Resource\FileRepository
{
	public function findAllByRelation($tableNames, $fieldNames, $extensions, $showEmpty, $settings)
    {
		$this->extensions = $extensions;
        $this->showEmpty = $showEmpty;
        $this->settings = $settings;
        $referenceUids = [];
		$itemList = [];

		if($this->getEnvironmentMode() === 'FE' && !empty($GLOBALS['TSFE']->sys_page))
		{
			$frontendController = $GLOBALS['TSFE'];

			$queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_file_reference');
            $queryBuilder->setRestrictions(GeneralUtility::makeInstance(FrontendRestrictionContainer::class));

            $res = $queryBuilder
                ->select('uid', 'uid_local')
                ->from('sys_file_reference')
                ->where(
                    $queryBuilder->expr()->in(
                        'tablenames',
                        $queryBuilder->createNamedParameter($tableNames, Connection::PARAM_STR_ARRAY)
                    ),
                    $queryBuilder->expr()->in(
                        'fieldname',
                        $queryBuilder->createNamedParameter($fieldNames, Connection::PARAM_STR_ARRAY)
                    )
                )
                ->orderBy('sorting_foreign')
                ->execute();

            while($row = $res->fetch())
            {
                $referenceUids[] = array('uid' => $row['uid'], 'uid_local' => $row['uid_local']);
            }

            $itemList = $this->prepareList($referenceUids);

            return $itemList;
		}
	}


	public function findAllByPage($pid, $tableNames, $fieldNames, $extensions, $showEmpty, $settings)
    {
        $this->extensions = $extensions;
        $this->showEmpty = $showEmpty;
        $this->settings = $settings;
        $referenceUids = [];
		$itemList = [];

		if($this->getEnvironmentMode() === 'FE' && !empty($GLOBALS['TSFE']->sys_page))
		{
			$frontendController = $GLOBALS['TSFE'];

			$queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_file_reference');
            $queryBuilder->setRestrictions(GeneralUtility::makeInstance(FrontendRestrictionContainer::class));

            $res = $queryBuilder
                ->select('uid', 'uid_local')
                ->from('sys_file_reference')
                ->where(
                    $queryBuilder->expr()->eq(
                        'pid',
                        $queryBuilder->createNamedParameter($pid, \PDO::PARAM_INT)
                    ),
                    $queryBuilder->expr()->in(
                        'tablenames',
                        $queryBuilder->createNamedParameter($tableNames, Connection::PARAM_STR_ARRAY)
                    ),
                    $queryBuilder->expr()->in(
                        'fieldname',
                        $queryBuilder->createNamedParameter($fieldNames, Connection::PARAM_STR_ARRAY)
                    )
                )
                ->orderBy('sorting_foreign')
                ->execute();

            while($row = $res->fetch())
            {
                $referenceUids[] = array('uid' => $row['uid'], 'uid_local' => $row['uid_local']);
            }

            $itemList = $this->prepareList($referenceUids);

            return $itemList;
		}
    }


    private function prepareList($references)
    {
        $itemList = [];

        if(!empty($references))
        {
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

        if(!empty($referenceUids))
        {
            foreach($referenceUids as $referenceUid)
            {
                $addItem = 0;

                try
                {
                    $fileReferenceObject = $this->factory->getFileReferenceObject($referenceUid);
                    $fileExtension = $fileReferenceObject->getExtension();

                    if(
                        in_array($fileExtension, $this->extensions) &&
                        $fileReferenceObject->isMissing() === false &&
                        file_exists($_SERVER['DOCUMENT_ROOT'] . $fileReferenceObject->getPublicUrl()) === true
                    )
                    {
                        if($this->settings['flexform']['exinlist'] == 1)
                        {
                            $addItem = 1;
                        }
                        if($this->settings['flexform']['exinlist'] == 2 && $fileReferenceObject->getProperty('tx_almimgcopyright_inlist') == 1)
                        {
                            $addItem = 1;
                        }
                        if($this->settings['flexform']['exinlist'] == 3 && $fileReferenceObject->getProperty('tx_almimgcopyright_exlist') != 1)
                        {
                            $addItem = 1;
                        }
                        if($addItem == 1)
                        {
                            if(($this->settings['flexform']['showempty'] == 0 && empty($fileReferenceObject->getProperty('tx_almimgcopyright_name'))) || ($this->settings['flexform']['showempty'] == 2 && !empty($fileReferenceObject->getProperty('tx_almimgcopyright_name'))))
                            {
                                $addItem = 0;
                            }
                        }
                    }
                    if($addItem == 1)
                    {
                        $itemList[] = $fileReferenceObject;
                    }
                }
                catch (ResourceDoesNotExistException $exception)
                {
                }
            }
        }

        if($this->settings['flexform']['sort'] == 1)
        {
            usort($itemList, function($first, $second){
                return strcasecmp($first->getProperty('tx_almimgcopyright_name'), $second->getProperty('tx_almimgcopyright_name'));
            });
        }

        return $itemList;
    }
}