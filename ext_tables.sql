#
# Table structure for table 'sys_file_metadata'
#
CREATE TABLE sys_file_metadata (
	tx_almimgcopyright_name tinytext,
	tx_almimgcopyright_link tinytext,
	tx_almimgcopyright_exlist tinyint(4) unsigned NOT NULL DEFAULT '0',
	tx_almimgcopyright_inlist tinyint(4) unsigned NOT NULL DEFAULT '0',
);