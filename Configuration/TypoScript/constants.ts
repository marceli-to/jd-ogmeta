plugin.tx_jdogmeta_jdogmeta {
    view {
        # cat=plugin.tx_jdogmeta_jdogmeta/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:jd_ogmeta/Resources/Private/Templates/
        # cat=plugin.tx_jdogmeta_jdogmeta/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:jd_ogmeta/Resources/Private/Partials/
        # cat=plugin.tx_jdogmeta_jdogmeta/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:jd_ogmeta/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_jdogmeta_jdogmeta//a; type=string; label=Default storage PID
        storagePid =
    }
}
