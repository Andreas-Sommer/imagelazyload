<?php

defined('TYPO3_MODE') || defined('TYPO3') || die('Access denied.');

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;

// Get extension configuration
$extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
$extensionConfiguration = $extensionConfiguration->get('imagelazyload');


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

ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);

$GLOBALS['TCA']['tt_content']['palettes']['imagelazyload']['showitem'] = '
	tx_imagelazyload,
';
