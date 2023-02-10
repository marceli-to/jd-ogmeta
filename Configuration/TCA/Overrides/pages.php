<?php
if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
}


// Add some fields to Pages table to show TCA fields definitions
// USAGE: TCA Reference > $GLOBALS['TCA'] array reference > ['columns'][fieldname]['config'] / TYPE: "select"
$temporaryColumns = [
	'tx_jdogmeta_page_title' => [
		'label' => 'LLL:EXT:jd_ogmeta/Resources/Private/Language/locallang_db.xlf:pages.tx_jd_ogmeta_jdogmeta.page_title',
		'exclude' => 1,
		'config' => [
			'type' => 'input',
			'max' => 255
		],
	],

    'tx_jdogmeta_meta_description' => [
        'exclude' => true,
		'label' => 'LLL:EXT:jd_ogmeta/Resources/Private/Language/locallang_db.xlf:pages.tx_jd_ogmeta_jdogmeta.meta_description',
        'config' => [
            'type' => 'text',
            'cols' => 30,
            'rows' => 5,
            'eval' => 'trim',
        ],
    ],

	'tx_jdogmeta_og_title' => [
		'label' => 'LLL:EXT:jd_ogmeta/Resources/Private/Language/locallang_db.xlf:pages.tx_jd_ogmeta_jdogmeta.og_title',
		'exclude' => 1,
		'config' => [
			'type' => 'input',
			'max' => 255
		],
	],

    'tx_jdogmeta_og_description' => [
        'exclude' => true,
		'label' => 'LLL:EXT:jd_ogmeta/Resources/Private/Language/locallang_db.xlf:pages.tx_jd_ogmeta_jdogmeta.og_description',
        'config' => [
            'type' => 'text',
            'cols' => 30,
            'rows' => 5,
            'eval' => 'trim',
        ],
    ],

    'tx_jdogmeta_og_image' => [
        'exclude' => true,
        'label' => 'LLL:EXT:jd_ogmeta/Resources/Private/Language/locallang_db.xlf:pages.tx_jd_ogmeta_jdogmeta.og_image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'image',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
                'foreign_types' => [
                    '0' => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                        'showitem' => '
                        --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                        --palette--;;filePalette'
                    ]
                ],
                'maxitems' => 1,
                'minitems' => 0
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ],	
	
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
	'pages',
	$temporaryColumns
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'pages',
	'--div--;SEO,tx_jdogmeta_page_title,tx_jdogmeta_meta_description,tx_jdogmeta_og_title,tx_jdogmeta_og_description,tx_jdogmeta_og_image' // add more fields comma separated
);