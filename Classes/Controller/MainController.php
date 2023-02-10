<?php
namespace Jamondigital\JdOgmeta\Controller;

/***
 *
 * This file is part of the "PumptrackMeta" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Marcel Stadelmann <marcel@jamon.digital>, Jam'on digital
 *
 ***/

/**
 * MainController
 */
class MainController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    
    /**
     * Suffix added to title and og:title
     */    
    
    protected $metaTitleSuffix;


    /**
     * Default meta description
     */ 
     
    protected $metaDefaultDescription;


    /**
     * Default site name
     */
     	
	protected $siteNameDefault;


    /**
     * Fallback image for og:image
     *
     * Use fullpath '/fileadmin/assets/img/dummy.png'
     */
     	
    protected $ogImageFallback;


    /**
     * mainRepository
     *
     * @var \Jamondigital\JdOgmeta\Domain\Repository\MainRepository
     * @inject
     */
    protected $mainRepository = null;

    /**
     * action set
     *
     * @return void
     */
    public function setAction()
    {
		/*
		todo: get the following fields from the tsfe-array:
			- tx_jdogmeta_page_title
			- tx_jdogmeta_meta_description
			- tx_jdogmeta_og_title
			- tx_jdogmeta_og_image
			- tx_jdogmeta_og_description		
		*/

		global $TSFE;
	    			
	    /**
	     *	Set the page title / og:title
	     *
	     *	Output:
	     *
	     *	<title>{meta_title}</title>
	     *	<meta property="og:title" content="{meta_title}">
	     *
	     */
		
		if (!empty($TSFE->page['tx_jdogmeta_page_title']))
		{
			$title 		= $TSFE->page['tx_jdogmeta_page_title'];
			$og_title   = $TSFE->page['tx_jdogmeta_page_title'];
		}
		else if (!empty($TSFE->page['subtitle']))
		{
			$title 		= $TSFE->page['subtitle'];
			$og_title   = $TSFE->page['subtitle'];
		}
		else
		{
			$title 		= $TSFE->page['title'];
			$og_title   = $TSFE->page['title'];
		}
        $this->view->assign('page_title', $title . ' - ' . $this->settings["pageTitleSuffix"]);

		
	    /**
	     *	Set the og:title, overwrite previously set $og_title variable
	     *
	     *	Output:
	     *
	     *	<meta property="og:title" content="{meta_title}">
	     *
	     */	

		if (!empty($TSFE->page['ogTitle']))
        {
	       $og_title = $TSFE->page['ogTitle']; 
        }
        $this->view->assign('og_title', $og_title . ' - ' . $this->settings["pageTitleSuffix"]); 


	    /**
	     *	Set the meta description / og:description
	     *
	     *	Output:
	     *
	     *	<meta name="description" content="{meta_description}">
	     *	<meta property="og:description" content="{meta_description}">
	     *
	     */	
	             
		if (!empty($TSFE->page['description']))
        {
	       $meta_description = $TSFE->page['description'];
	       $og_description	 = $TSFE->page['description']; 
        }
        else
        {
	       $meta_description = $this->settings["defaultMetaDescription"]; 
	       $og_description	 = $this->settings["defaultMetaDescription"]; 
        }
        $this->view->assign('meta_description', $meta_description);
        

	    /**
	     *	Set the og:description, overwrite previously set $og_description variable
	     *
	     *	Output:
	     *
	     *	<meta property="og:description" content="{og_description}">
	     *
	     */        
        
		if (!empty($TSFE->page['tx_jdogmeta_meta_description']))
        {
	       $og_description = $TSFE->page['tx_jdogmeta_meta_description']; 
        }
        $this->view->assign('og_description', $og_description);        
        

	    /**
	     *	Set the og:url
	     *
	     *	Output:
	     *
	     *	<meta property="og:url" content="{og_url}">
	     *
	     */         

        $current_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->view->assign('og_url', $current_url);
        

	    /**
	     *	Set the og:image
	     *
	     *	Output:
	     *
	     *	<meta property="og:image" content="{og_image}">
	     *
	     */  
	     
        if (!empty($TSFE->page['tx_jdogmeta_og_image']))
        {
	       $og_image = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://". $_SERVER['HTTP_HOST'] . $TSFE->page['tx_jdogmeta_og_image']; 
        }
        else
        {
	        $og_image = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://". $_SERVER['HTTP_HOST'] . $this->settings["defaultOpenGraphImage"];
        }
		$this->view->assign('og_image', $og_image);
		

	    /**
	     *	Set the og:site_name
	     *
	     *	Output:
	     *
	     *	<meta property="og:site_name" content="{og_site_name}">
	     *
	     */
	     		
		$this->view->assign('og_site_name', $this->settings["siteName"]);
    }
}
