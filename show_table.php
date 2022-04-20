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


// Select all rows from DB
$props_query_str = '
        select * from example
';


$props_query_stmt = oci_parse($conn, $props_query_str);

oci_execute($props_query_stmt, OCI_DEFAULT);


// Display results as an ordered list
echo "<ol>";

$results = array();
while ($row = oci_fetch_array($props_query_stmt, OCI_ASSOC)) {
    echo "<li>" . $row['SUBMISSION'] . "</li>";
}

echo "</ol>";

oci_free_statement($props_query_stmt);





oci_close($conn);


?>

<a href="index.php">Back</a>
