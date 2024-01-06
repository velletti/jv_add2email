<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!defined ('TYPO3')) die ('Access denied.' );
$_EXTKEY = "jv_add2email" ;
ExtensionManagementUtility::addPlugin(
    Array('LLL:EXT:jv_add2email/Resources/Private/Language/locallang.xlf:add2email.name',
    'jv_add2email') ,
    'list_type' ,
    'jv_add2email'

);

// BOTH Lines are needed to see the Flexform in Backend !!1
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['jv_add2email'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue('jv_add2email', 'FILE:EXT:jv_add2email/Configuration/FlexForms/flexform.xml');
