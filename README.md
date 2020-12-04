# AlmImageCopyright
Adds copyright-fields to Files, to use in your templates for image-license-information.
Content-Element to show all used images with license-information, e.g. in 'imprint' or show all used images on a page, e.g. in footer.

## New Database-Fields
- tx_almimgcopyright_name		=> Copyright: Name
- tx_almimgcopyright_link		=> Copyright: Link (Full URL)
- tx_almimgcopyright_exlist		=> Copyright: Exclude from Lists
- tx_almimgcopyright_inlist		=> Copyright: Include in Lists

## Typoscript (Default Settings)
plugin.tx_almimgcopyright.settings.tableNames = pages, tt_content, tx_news_domain_model_news
plugin.tx_almimgcopyright.settings.fieldNames = media, fal_media, image, images
plugin.tx_almimgcopyright.settings.extensions = jpg, jpeg, png, gif
plugin.tx_almimgcopyright.settings.globalName =
plugin.tx_almimgcopyright.settings.globalLink =

## Fluid Vars
### files as resource (in templates of this extension)
- resource.originalFile.properties.uid
- resource.properties.tx_almimgcopyright_name
- resource.properties.tx_almimgcopyright_link

### yourfield as resource
- resource.tx_almimgcopyright_name
- resource.tx_almimgcopyright_link

- settings.globalName
- settings.globalLink

## In external Templates
- <f:cObject typoscriptObjectPath="plugin.tx_almimgcopyright.list.globalName" />
- <f:cObject typoscriptObjectPath="plugin.tx_almimgcopyright.list.globalLink" />

## Donate
[![BTC](https://img.shields.io/badge/BTC-1FNovwksVXZFs76kxehHpvf4aLTwbe7i8G-informational)](https://www.blockchain.com/btc/address/1FNovwksVXZFs76kxehHpvf4aLTwbe7i8G)  
[![ETH](https://img.shields.io/badge/ETH-0xec21087F42442573573c361762E021691992ccC4-informational)](https://etherscan.io/address/0xec21087F42442573573c361762E021691992ccC4)

## License
![License GPL](https://img.shields.io/badge/License-GPL-blue?style=flat-square)

Read the LICENSE.md