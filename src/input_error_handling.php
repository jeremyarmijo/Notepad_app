<?php
    function input_error_handling($email, &$message, $password, $confirm_password)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "<h4 class='error' style='zoom: 0.5;'>Error: Invalid email format</h4>";
            return True;
        } elseif ($confirm_password != "#login" && $password != $confirm_password) {
            $message = "<h4 class='error' style='zoom: 0.5;'>Error: Passwords are not equal</h4>";
            return True;
        } elseif (!ctype_alnum($password)) {
            $message = "<h4 class='error' style='zoom: 0.5;'>Error: Password must contain alphanumeric characters</h4>";
            return True;
        }
        return False;
    }
?>