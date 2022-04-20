<?php


$db_conn_str =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";

$conn = oci_connect("jr550", "Wo0dabu9a", $db_conn_str);

if (!$conn) {
    echo 'Error connecting...';
}


echo $_POST['my_str'];



$props_query_str = '
        
';


$props_query_stmt = oci_parse($conn, $props_query_str);

oci_bind_by_name($props_query_stmt, ':seller_name', $req->seller_name);


oci_execute($props_query_stmt, OCI_COMMIT_ON_SUCCESS);


echo oci_free_statement($props_query_stmt);





oci_close($conn);



?>