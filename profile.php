<?php
session_start();

$db_conn = mysqli_connect('localhost', 'root', '', 'physio');

if ($db_conn) {
    if (isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
        $sql = "SELECT username, gender FROM signup WHERE id = $userID";
        $result = mysqli_query($db_conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $username = $row['username'];
                $gender = $row['gender'];
            }
        }
    }
}
?>
