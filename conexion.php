<?php
$conn = oci_connect('sys', '060801Areli', '//localhost:1521/orcl', 'UTF8', OCI_SYSDBA);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
?> 


