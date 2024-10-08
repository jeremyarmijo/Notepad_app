<?php
    include '../req/req_check_data.php';
    include '../db/connect_database.php';
    include '../src/input_error_handling.php';
    include '../req/check_password.php';

    function login($conn, $email, &$message, $password)
    {
        $stmt = req_check_data($conn, "SELECT email FROM user WHERE email = ?", $email);

        if ($stmt->num_rows > 0) {
            if (check_password($conn, $email, $password)) {
                mysqli_close($conn);
                header('Location: http://localhost:8000/notes/notes.php');
                session_start();
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
            } else
                $message = "<h4 class='error' style='zoom: 0.5;'>Incorrect password</h4>";      
        } else
            $message = "<h4 class='error' style='zoom: 0.5;'>Account doesn't exist</h4>";
        $stmt->close();
        return $message;
    }

    function check_log_in()
    {
        $conn = connect_database();
        $message = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = "#login";
            if (!input_error_handling($email, $message, $password, $confirm_password))
                $message = login($conn, $email, $message, $password);
        }
        mysqli_close($conn);
        return $message;
    }
?>