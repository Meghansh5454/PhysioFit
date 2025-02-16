<?php
// Include your database configuration file
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['mark_resolved'])) {
        // Handle Mark Resolved action
        $messageId = $_POST['message_id'];
        // Perform the necessary update in the database, for example:
        mysqli_query($db_conn, "UPDATE `contactus` SET resolved = 1 WHERE id = $messageId");
    } elseif (isset($_POST['delete'])) {
        // Handle Delete action
        $messageId = $_POST['message_id'];
        // Perform the necessary delete in the database, for example:
        mysqli_query($db_conn, "DELETE FROM `contactus` WHERE id = $messageId");
    }
}

// Redirect back to the page with the contact messages
header('Location: contactfetch.php'); // Replace 'your_page.php' with the actual filename of your contact page
exit();
?>
