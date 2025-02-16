<?php
$db_conn = mysqli_connect('localhost', 'root', '', 'physio');

if ($db_conn) {
    // Connection successful
} else {
    // Connection failed
    echo "connection fail";
    exit();
}
?>