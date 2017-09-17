<?php
namespace Alm\AlmImgcopyright\Controller;

class ImglistController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
	 * fileRepository
	 *
	 * @var Alm\AlmImgcopyright\Resource\FileRepository
	 * @inject
	 */
	protected $fileRepository;


	public function initializeAction()
	{
		$this->cObjectData = $this->configurationManager->getContentObject()->data;
	}

	public function listAllAction()
	{
		$tableNames = $this->settings['tableNames'];
		$fieldNames = $this->settings['fieldNames'];
		$extensions = $this->settings['extensions'];
		$globalName = $this->settings['globalName'];
		$globalLink = $this->settings['globalLink'];

		$tableNames = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $tableNames, true);
		$fieldNames = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $fieldNames, true);
		$extensions = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $extensions, true);
		
		$files = $this->fileRepository->findAllByRelation($tableNames, $fieldNames, $extensions);

		$this->view->assign('element', $this->cObjectData);
		$this->view->assign('files', $files);
	}

	public function listPageAction()
	{
		$tableNames = $this->settings['tableNames'];
		$fieldNames = $this->settings['fieldNames'];
		$extensions = $this->settings['extensions'];
		$globalName = $this->settings['globalName'];
		$globalLink = $this->settings['globalLink'];

		$tableNames = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $tableNames, true);
		$fieldNames = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $fieldNames, true);
		$extensions = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $extensions, true);
		
		$pid = $this->cObjectData['pid'];

		$files = $this->fileRepository->findAllByPage($pid, $tableNames, $fieldNames, $extensions);

		$this->view->assign('element', $this->cObjectData);
		$this->view->assign('files', $files);
	}
}