<link rel="stylesheet" type="text/css" href="../index.css" />
<!DOCTYPE html>
<?php
    include '../req/check_data.php';

    session_start();
    $_SESSION['account_not_exist'] = "<h4 class='error' style='zoom: 1.5;'>Error: Account doesn't exist</h4>";
    $notes = "<center/>No notes registred";
    $error_message = check_account($notes, $_SESSION['email'], $_SESSION['password']);

    if (!empty($error_message)) {
        echo $error_message;
        return;
    }
?>
<html>
<body>
<form action="../notes/add_note.php" method="POST">
    <input class="buttonStyle" name="Add note" type="submit" value="Add note"/>
</form>
<h1><center/>Your notes</h1>
<?php
    echo $notes;
?>
</body>
