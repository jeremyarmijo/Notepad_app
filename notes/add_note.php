<link rel="stylesheet" type="text/css" href="../index.css" />
<?php
    include '../req/req_check_data.php';
    include '../db/connect_database.php';

    session_start();
    function add_note($email, $password)
    {
        $message = "";
        $conn = connect_database();
        if (empty($_SESSION["email"]) || empty($_SESSION["password"])
            || empty($_POST["title"]) || empty($_POST["description"]))
            return;
        $stmt = $conn->prepare("INSERT INTO notes (email, title, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_SESSION["email"], $_POST["title"], $_POST["description"]);
        if ($stmt->execute()) {
                $message = "Note registered";
            } else {
                $message = "Error: " . $stmt->error;
        }
        $stmt->close();
        return $message;
    }
?>
<form action="../notes/notes.php" method="POST">
    <input class="buttonStyle" name="Back" type="submit" value="Back"/>
</form>

<div class="center">
    <div class="big">
        <form method="POST">
            <center/>
                <h3>Add note</h3>
                Title: <br/><input type="text" name="title" required><br/>
                Description: <br/><input type="text" name="description" required><br/>
    </div>
            <center/>
            <?php $message = add_note($_SESSION['email'], $_SESSION['password']); if (!empty($message)) echo $message;?>
            <center/>
            <br/><input class="buttonStyle" type="submit" name="submit" value="Submit">
        </form>
</div>
