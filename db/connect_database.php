<?php
    function connect_database()
    {
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "notepad";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn)
            die("Connection failed: " . mysqli_connect_error());
        return $conn;
    }
?>
