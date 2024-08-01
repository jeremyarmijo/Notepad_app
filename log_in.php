<?php include 'account_notes.php'; ?>

<link rel="stylesheet" type="text/css" href="index.css" />
<!DOCTYPE html>
<html>
<body>

<form action="sign_up.php" method="POST">
    <input class="buttonStyle" name="Sign up" type="submit" value="Sign up"/>
</form>

<div class="center">
    <div class="big">
        <form method="POST">
            <center/>
                <h3>Log in</h3>
                Email: <br/><input type="text" name="email" required><br/>
                Password: <br/><input type="password" name="password" required><br/>
                <?php $message = check_log_in(); if (!empty($message)) echo $message; ?>
                </div>
    <center/>
    <input class="buttonStyle" type="submit" name="submit" value="Submit">
    </form>
</div>
<!-- password_verify('aaa', $hash) -->
</body>
</html>
