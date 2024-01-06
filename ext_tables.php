<?php
defined('TYPO3') || die('Access denied.' );

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'JvAdd2email',
            'Add2email',
            'Let Frontenduser handle Newsletter Optin'
        );

        $pluginSignature = str_replace('_', '', 'jv_add2email') . '_add2email';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:jv_add2email/Configuration/FlexForms/flexform.xml');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jv_add2email', 'Configuration/TypoScript', 'Let Frontenduser handle Newsletter Optin');

    }
);
