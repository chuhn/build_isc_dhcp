<?php

include('/etc/opennetadmin/database_settings.inc.php');

$context_name = 'DEFAULT';
$cdbs = $ona_contexts[$context_name]['databases']['0'];

$db = ADONewConnection($cdbs['db_type']);

$db->NConnect( $cdbs['db_host'], $cdbs['db_login'], $cdbs['db_passwd'], '' );

$db->SelectDB($cdbs['db_database']);

$db->debug = true;

// from install.sql
$rs = $db->Execute("insert into sys_config (name, value, description, field_validation_rule, failed_rule_text, editable, deleteable) values ('build_dhcp_type', 'isc', 'DHCP build type', '', '', 1, 1) on duplicate key update value='isc'");

?>
