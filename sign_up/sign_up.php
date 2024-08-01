<?php include 'check_sign_up.php';?>
<link rel="stylesheet" type="text/css" href="../index.css" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CAPTCHA Validation</title>
    <link rel="stylesheet" type="text/css" href="../index.css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <form action="../log_in/log_in.php" method="POST">
        <input class="buttonStyle" name="Log in" type="submit" value="Log in"/>
    </form>
    <div class="center">
        <form method="POST">
            <div class="big">
                <center/>
                    <h3>Sign up</h3>
                        Email: <br/><input type="text" name="email" required><br/>
                        Password: <br/><input type="password" name="password" required><br/>
                        Confirm password: <br/><input type="password" name="confirm_password" required><br/>
                        <?php $message = check_sign_up(); if (!empty($message)) echo $message; ?>
            </div>
                <center/>
                    <br/><div class="g-recaptcha" data-sitekey="6LejVBgqAAAAACB2eJPm33UcKFh3qGCVVBKSxAfJ"></div><br/>
                    <input class="buttonStyle" type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
