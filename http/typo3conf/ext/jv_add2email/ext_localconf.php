<?php
defined('TYPO3') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'JvAdd2email',
            'Add2email',
            [
                \JVE\JvAdd2email\Controller\Add2emailController::class => 'show,add,remove,unsubscribe'
            ],
            // non-cacheable actions
            [
                \JVE\JvAdd2email\Controller\Add2emailController::class => 'show,add,remove,unsubscribe'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        connector {
                            iconIdentifier = jv_add2email-plugin-add2email
                            title = LLL:EXT:jv_add2email/Resources/Private/Language/locallang.xlf:add2email.name
                            description = LLL:EXT:jv_add2email/Resources/Private/Language/locallang.xlf:add2email.description
                            tt_content_defValues {
                                CType = list
                                list_type = jvadd2email_add2email
                            }
                        }
                    }
                    show = *
                }
           }'
        );

		
    }
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

$iconRegistry->registerIcon(
    'jv_add2email-plugin-add2email',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:jv_add2email/Resources/Public/Icons/user_plugin.svg']
);

