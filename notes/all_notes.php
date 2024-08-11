<?php
    function all_notes($conn, $email, $notes)
    {
      $result = mysqli_query($conn, "select * from notes WHERE email=\"$email\";") or die(mysqli_error($conn));
      $all_notes = "";
      $stmt = req_check_data($conn, "select * from notes WHERE email=?", $email);

      if ($stmt->num_rows == 0) {
        $stmt->close();
        return $notes;
      }
      while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        $all_notes = $all_notes."<div class=\"center\">";
        $variables = "created_at=".$row['created_at']."&title=".$row['title'].'&description='.$row['description'];
        $all_notes = $all_notes."<form action=\"../notes/delete_note.php?$variables\" method=\"POST\"><input name=\"Delete\" type=\"submit\" value=\"Delete\"/></form><center/>";
        $notes = $row['created_at']."<h2>".$row['title'].'</h2>'.'<br/>'.$row['description'];
        $all_notes = $all_notes.$notes;
        $all_notes = $all_notes."</div><br/>";
      }
      return $all_notes;
    }
?>
