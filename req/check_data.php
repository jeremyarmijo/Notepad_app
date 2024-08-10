<?php
    include "../db/connect_database.php";
    include "req_check_data.php";
    include "check_password.php";
    include "../notes/all_notes.php";

    function check_account(&$notes, $email, $password)
    {
        session_start();
        $conn = connect_database();
        $email = $email;
        $password = $password;
        $stmt = req_check_data($conn, "SELECT email FROM user WHERE email = ?", $email);
        $message = "";

        if ($stmt->num_rows > 0) {
            if (check_password($conn, $email, $password)) {
                $notes = all_notes($conn, $email, $notes);
            } else
                $message = "<h4 class='error' style='zoom: 1.5;'>Error: Incorrect password</h4>";
        } else
            $message = $_SESSION['account_not_exist'];
        $stmt->close();
        mysqli_close($conn);
        return $message;
    }
?>