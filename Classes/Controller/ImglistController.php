<?php
declare(strict_types=1);
namespace Alm\AlmImgcopyright\Controller;

class ImglistController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
	 * @var \Alm\AlmImgcopyright\Resource\FileRepository
	 */
	protected $fileRepository;


	/**
     * @param \Alm\AlmImgcopyright\Resource\FileRepository $fileRepository
     */
    public function injectFileRepository(\Alm\AlmImgcopyright\Resource\FileRepository $fileRepository)
    {
        $this->fileRepository = $fileRepository;
    }

	public function initializeAction(): void
	{
		$this->cObjectData = $this->request->getAttribute('currentContentObject')->data;

		$this->tableNames = $this->settings['tableNames'];
		$this->fieldNames = $this->settings['fieldNames'];
		$this->extensions = $this->settings['extensions'];
		$this->showEmpty = $this->settings['flexform']['showempty'];

		$this->tableNames = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->tableNames, true);
		$this->fieldNames = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->fieldNames, true);
		$this->extensions = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->extensions, true);
	}

	public function listAction()
	{
		if($this->settings['flexform']['listType'] == 1)
		{
			$files = $this->fileRepository->findAllByRelation($this->tableNames, $this->fieldNames, $this->extensions, $this->showEmpty, $this->settings, $this->cObjectData);
		}

		if($this->settings['flexform']['listType'] == 2)
		{
			$pid = $this->cObjectData['pid'];
			$files = $this->fileRepository->findAllByPage($pid, $this->tableNames, $this->fieldNames, $this->extensions, $this->showEmpty, $this->settings, $this->cObjectData);
		}

		$this->view->assign('element', $this->cObjectData);
		$this->view->assign('files', $files);

		return $this->htmlResponse();
	}
}