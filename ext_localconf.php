<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Jamondigital.' . $extKey,
            'Jdogmeta',
            [
                'Main' => 'set'
            ],
            // non-cacheable actions
            [
            ]
        );

	    // wizards
	    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
	        'mod {
	            wizards.newContentElement.wizardItems.plugins {
	                elements {
	                    jdogmeta {
	                        iconIdentifier = jd_ogmeta-plugin-jdogmeta
	                        title = LLL:EXT:jd_ogmeta/Resources/Private/Language/locallang_db.xlf:tx_jd_ogmeta_jdogmeta.name
	                        description = LLL:EXT:jd_ogmeta/Resources/Private/Language/locallang_db.xlf:tx_jd_ogmeta_jdogmeta.description
	                        tt_content_defValues {
	                            CType = list
	                            list_type = jdogmeta_jdogmeta
	                        }
	                    }
	                }
	                show = *
	            }
	       }'
	    );
	    
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		$iconRegistry->registerIcon(
			'jd_ogmeta-plugin-jdogmeta',
			\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
			['source' => 'EXT:jd_ogmeta/Resources/Public/Icons/user_plugin_jdogmeta.svg']
		);
    },
    'JdOgmeta'
);
