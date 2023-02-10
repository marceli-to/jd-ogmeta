<?php
namespace Jamondigital\JdOgmeta\ViewHelpers;

/**
 *	ViewHelper to add meta- and open graph tags to the TSFE array
 *
 *	1. Add Namespace:
 *	<html xmlns:f="https://typo3.org/ns/TYPO3/CMS/Fluid/ViewHelpers" xmlns:jd="http://typo3.org/ns/Jamondigital/JdOgmeta/ViewHelpers" data-namespace-typo3-fluid="true">
 * 
 *	2. Add ViewHelper:
 * 	<jd:metaTags pageTitle="" ogImage="" ogTitle="" ogDescription="" overWriteDescription="true/false" />
 *
 */

class MetaTagsViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	
	/**
	 * Arguments Initialization
	 */
	
	public function initializeArguments()
	{
		$this->registerArgument('pageTitle', 'string', 'The title used for title and/or og:title', FALSE);
		$this->registerArgument('ogImage', 'string', 'The image used for og:image', FALSE);
		$this->registerArgument('ogTitle', 'string', 'The title used for og:title', FALSE);
		$this->registerArgument('ogDescription', 'string', 'The text used for og:description', FALSE);
		$this->registerArgument('overWriteDescription', 'boolean', 'Option used to overwrite the description field (meta description)', FALSE);
	}
	
	/**
	 *	Render
	 *	@return nothing
	 */
	
	public function render()
	{
		if ($this->arguments['pageTitle'])
		{
			$GLOBALS['TSFE']->page['tx_jdogmeta_page_title'] = $this->arguments['pageTitle'];
			$GLOBALS['TSFE']->page['tx_jdogmeta_og_title'] 	 = $this->arguments['pageTitle'];
		}
		
		if ($this->arguments['ogTitle'])
		{
			$GLOBALS['TSFE']->page['tx_jdogmeta_og_title'] = $this->arguments['ogTitle'];
		}

		if (!empty($this->arguments['ogDescription']))
		{
			$GLOBALS['TSFE']->page['tx_jdogmeta_og_description'] = $this->arguments['ogDescription'];
			
			if ($this->arguments['overWriteDescription'])
			{
				$GLOBALS['TSFE']->page['tx_jdogmeta_meta_description'] = $this->arguments['ogDescription'];	
			}
		}
		
		if ($this->arguments['ogImage'])
		{
			$GLOBALS['TSFE']->page['tx_jdogmeta_og_image'] = $this->arguments['ogImage'];
		}
	}
}