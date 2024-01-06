<?php
if (!defined ('TYPO3')) die ('Access denied.' );
$_EXTKEY = "jv_add2email" ;
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('jv_add2email','Configuration/TypoScript/', 'Add user To Email newsletter');