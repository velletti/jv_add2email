
plugin.tx_jvadd2email {
    view {
        # cat=plugin.tx_jvbanners_connector/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:tx_jvadd2email/Resources/Private/Templates/

        # cat=plugin.tx_jvbanners_connector/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:tx_jvadd2email/Resources/Private/Partials/
        # cat=plugin.tx_jvbanners_connector/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:tx_jvadd2email/Resources/Private/Layouts/
    }
}
