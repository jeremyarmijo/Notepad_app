<?php
    include 'connect_database.php';
    include 'input_error_handling.php';

    function login($email, $message, $password)
    {
        $stmt = req_check_data($conn, "SELECT email FROM  WHERE email = ?", $email);
        if ($stmt->num_rows > 0) {
            $message = "<h4 class='error' style='zoom: 0.5;'>Error: This email already exists.</h4>";
        } else {
            $stmt->close();
            $stmt = $conn->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, password_hash($password, PASSWORD_DEFAULT));
            if ($stmt->execute()) {
                header("Location: http://localhost:8080/notes/notes.php");
            } else {
                $message = "Error: " . $stmt->error;
            }
        }
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
                $message = login($email, $message, $password);
        }
        mysqli_close($conn);
        return $message;
    }
?>