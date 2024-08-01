<?php
    function req_check_data($conn, $req, $data)
    {
        $stmt = $conn->prepare($req);
        $stmt->bind_param("s", $data);
        $stmt->execute();
        $stmt->store_result();
        if (!$stmt)
            die("req_check_data faile");
        return $stmt;
    }

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
                header("Location: http://localhost:8080/notes/notes.php");
            } else {
                $message = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
        return $message;
    }
?>