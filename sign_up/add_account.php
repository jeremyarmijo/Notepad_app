<?php
    include '../req/req_check_data.php';

    function add_account($conn, $email, $password)
    {
        $stmt = req_check_data($conn, "SELECT email FROM user WHERE email = ?", $email);

        if ($stmt->num_rows > 0) {
            $message = "<h4 class='error' style='zoom: 0.5;'>Error: This email already exists.</h4>";
        } else {
            $stmt->close();
            $stmt = $conn->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, password_hash($password, PASSWORD_DEFAULT));
            if ($stmt->execute()) {
                header('Location: http://localhost:8000/notes/notes.php');
                session_start();
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
            } else {
                $message = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
        return $message;
    }
?>