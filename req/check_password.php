<?php
    function check_password($conn, $email, $password)
    {
        $result = mysqli_query($conn, "SELECT password FROM user WHERE email = \"$email\"") or die(mysqli_error($conn));

        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            $hash_password = $row['password'];
            if (password_verify($password, $hash_password))
                return TRUE;
        }
        return FALSE;
    }

?>