<?php


$username = "jr550";
$password = "Wo0dabu9a";

$db_conn_str =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";

$conn = oci_connect($username, $password, $db_conn_str);

if (!$conn) {
    echo 'Error connecting...';
}



$props_query_str = '
        select * from example
';


$props_query_stmt = oci_parse($conn, $props_query_str);

oci_execute($props_query_stmt, OCI_DEFAULT);

echo "<ol>";

$results = array();
while ($row = oci_fetch_array($props_query_stmt, OCI_ASSOC)) {
    echo "<li>" . $row['SUBMISSION'] . "</li>";
}

echo "</ol>";

oci_free_statement($props_query_stmt);





oci_close($conn);


?>