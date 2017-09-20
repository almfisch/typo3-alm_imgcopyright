AlmImageCopyright:
Adds fields for copyright information in original file


New Database-Fields:

- tx_almimgcopyright_name		=> Copyright: Name
- tx_almimgcopyright_link		=> Copyright: Link (Full URL)
- tx_almimgcopyright_exlist		=> Copyright: Exclude from Lists


Typoscript (Default Settings)
plugin.tx_almimgcopyright.settings.tableNames = pages, tt_content, tx_news_domain_model_news
plugin.tx_almimgcopyright.settings.fieldNames = media, fal_media, image, images
plugin.tx_almimgcopyright.settings.extensions = jpg, jpeg, png, gif
plugin.tx_almimgcopyright.settings.showEmpty = 0
plugin.tx_almimgcopyright.settings.globalName =
plugin.tx_almimgcopyright.settings.globalLink =
plugin.tx_almimgcopyright.list.globalName = TEXT
plugin.tx_almimgcopyright.list.globalName.value =
plugin.tx_almimgcopyright.list.globalLink = TEXT
plugin.tx_almimgcopyright.list.globalLink.value =

Overwrite:
plugin.tx_almimgcopyright.list.globalName.value < plugin.tx_almimgcopyright.settings.globalName
plugin.tx_almimgcopyright.list.globalLink.value < plugin.tx_almimgcopyright.settings.globalLink

Fluid Vars:
- files as resource (in templates of this extension)
-- resource.originalFile.properties.uid
-- resource.properties.tx_almimgcopyright_name
-- resource.properties.tx_almimgcopyright_link

- yourfield as resource
-- resource.tx_almimgcopyright_name
-- resource.tx_almimgcopyright_link

- settings.globalName
- settings.globalLink

In external Templates:
- <f:cObject typoscriptObjectPath="plugin.tx_almimgcopyright.list.globalName" />
- <f:cObject typoscriptObjectPath="plugin.tx_almimgcopyright.list.globalLink" />