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
?>