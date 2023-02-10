plugin.tx_jdogmeta_jdogmeta {
    view {
        templateRootPaths.0 = EXT:jd_ogmeta/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_jdogmeta_jdogmeta.view.templateRootPath}
        partialRootPaths.0 = EXT:jd_ogmeta/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_jdogmeta_jdogmeta.view.partialRootPath}
        layoutRootPaths.0 = EXT:jd_ogmeta/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_jdogmeta_jdogmeta.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_jdogmeta_jdogmeta.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
    
    settings {
	    # Site name
	    siteName = HR Glas
	    	    
	    # Suffix for page title
	    pageTitleSuffix = HR Glas
	    
	    # default open graph image
	    defaultOpenGraphImage = /fileadmin/assets/img/og.jpg
	    
	    # default meta description
	    defaultMetaDescription = Ihr Spezialist für rahmenlose Glas-Duschen nach Mass in Zürich
    }
}

# these classes are only used in auto-generated templates
plugin.tx_jdogmeta._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-jd-ogmeta table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-jd-ogmeta table th {
        font-weight:bold;
    }

    .tx-jd-ogmeta table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)