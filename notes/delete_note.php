<?php
    session_start();
    include '../req/req_check_data.php';
    include '../db/connect_database.php';

    function delete_note($email, $title, $description, $created_at)
    {
        $message = "";
        $conn = connect_database();

        if (empty($email) || empty($title)|| empty($description) || empty($created_at))
            return;
        $stmt = $conn->prepare("DELETE FROM notes WHERE email=? and title=? and description=? and created_at=?");
        $stmt->bind_param("ssss", $email, $title, $description, $created_at);
        if ($stmt->execute()) {
                $message = "Note deleted";
            } else {
                $message = "Error: " . $stmt->error;
        }
        $stmt->close();
        return $message;
    }
    delete_note($_SESSION["email"], $_GET['title'], $_GET['description'], $_GET['created_at']);
    header('Location: http://localhost:8000/notes/notes.php');
?>