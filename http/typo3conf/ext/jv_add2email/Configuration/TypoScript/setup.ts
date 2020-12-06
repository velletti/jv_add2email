
plugin.tx_jvadd2email_add2email {
    view {
        templateRootPaths.0 = EXT:jv_add2email/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_jvadd2email.view.templateRootPath}
        partialRootPaths.0 = EXT:jv_add2email/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_jvadd2email.view.partialRootPath}
        layoutRootPaths.0 = EXT:jv_add2email/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_jvadd2email.view.layoutRootPath}
    }
    features {
        skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 0
    }
    mvc {
        callDefaultActionIfActionCantBeResolved = 1
    }
}

