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

		$this->tableNames = $this->settings['tableNames'];
		$this->fieldNames = $this->settings['fieldNames'];
		$this->extensions = $this->settings['extensions'];
		$this->showEmpty = $this->settings['showEmpty'];

		$this->tableNames = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->tableNames, true);
		$this->fieldNames = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->fieldNames, true);
		$this->extensions = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->extensions, true);
	}

	public function listAllAction()
	{
		$files = $this->fileRepository->findAllByRelation($this->tableNames, $this->fieldNames, $this->extensions, $this->showEmpty);

		$this->view->assign('element', $this->cObjectData);
		$this->view->assign('files', $files);
	}

	public function listPageAction()
	{
		$pid = $this->cObjectData['pid'];

		$files = $this->fileRepository->findAllByPage($pid, $this->tableNames, $this->fieldNames, $this->extensions, $this->showEmpty);

		$this->view->assign('element', $this->cObjectData);
		$this->view->assign('files', $files);
	}
}