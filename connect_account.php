<?php
    include 'connect_database.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT));
        $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0)
            echo "hello";
            // header("Location: http://localhost:8080/notes/notes.php");
        // } else {
        //     $stmt->close();
        //     $stmt = $conn->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
        //     $stmt->bind_param("ss", $email, password_hash($password, PASSWORD_DEFAULT));
        //     if ($stmt->execute()) {
        //     } else {
        //         $message = "Error: " . $stmt->error;
        //     }
        // }
        $stmt->close();
    }
?>