<?php


$username = "";
$password = "";

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
        insert into example
        values (:my_str)
';


$props_query_stmt = oci_parse($conn, $props_query_str);


// bind vars passed from form to $_POST to query statement
oci_bind_by_name($props_query_stmt, ':my_str', $_POST['my_str']);;


// MUST USE 'OCI_COMMIT_ON_SUCCESS" OR YOUR INSERT WILL HAVE NO EFFECT!!!
oci_execute($props_query_stmt, OCI_COMMIT_ON_SUCCESS);


echo oci_free_statement($props_query_stmt);

echo $_POST['my_str'] . ' Submitted to DB!';




oci_close($conn);



?>

<a href="index.php">Back</a>
