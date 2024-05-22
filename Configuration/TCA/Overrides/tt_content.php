<?php

defined('TYPO3_MODE') || defined('TYPO3') || die('Access denied.');

$tempColumns = array(
    'tx_imagelazyload' => [
        'exclude' => 1,
        'label' => 'Lazy load images',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                [
                    0 => '',
                    1 => '',
                    'invertStateDisplay' => true
                ]
            ],
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ]
        ]
    ],
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content',
    'tx_imagelazyload',
'image,textpic,textmedia',
'after:image_zoom');

$GLOBALS['TCA']['tt_content']['palettes']['imagelazyload']['showitem'] = '
	tx_imagelazyload,
';
