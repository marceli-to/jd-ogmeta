<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Jamondigital.JdOgmeta',
            'Jdogmeta',
            'OpenGraphMetaTags'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jd_ogmeta', 'Configuration/TypoScript', 'OpenGraphMetaTags');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jdogmeta_domain_model_main', 'EXT:jd_ogmeta/Resources/Private/Language/locallang_csh_tx_jdogmeta_domain_model_main.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jdogmeta_domain_model_main');
    },
    'JdOgmeta'
);
