<?php
    include '../src/input_error_handling.php';
    include '../db/connect_database.php';
    include 'add_account.php';

    function check_sign_up()
    {
        $conn = connect_database();
        $message = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = $_POST['confirm_password'];
            if (!input_error_handling($email, $message, $password, $confirm_password))
                $message = add_account($conn, $email, $password);
        }
        mysqli_close($conn);
        return $message;
    }
?>