# Typo3 Extension for Meta- and OpenGraph Tags

### Typoscript
``` 
temp.jdMetaOg = USER
temp.jdMetaOg {
    userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
    extensionName = JdOgmeta
    pluginName = Jdogmeta
    vendorName = Jamondigital
    controller = Main
    action = set
    view < plugin.tx_jdogmeta_jdogmeta.view
    persistence < plugin.tx_jdogmeta_jdogmeta.persistence
    settings < plugin.tx_jdogmeta_jdogmeta.settings
}

lib.jdMetaOg = COA
lib.jdMetaOg < temp.jdMetaOg
```

### Fluid template (Head)
```
<f:format.raw>
	<f:spaceless>{jdMetaOg}</f:spaceless>
</f:format.raw>
```
