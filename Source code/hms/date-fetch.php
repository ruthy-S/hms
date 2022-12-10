<?php
require_once('security.php');

$output = '';  
 if(isset($_POST['doctor']))  
 {  
      if($_POST['doctor'] != '') {  
          $statement = $pdo->prepare("SELECT * FROM tbl_schedule WHERE doctor_id=?");
          $statement->execute(array($_POST['doctor']));
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      }  
      else {  
          $statement = $pdo->prepare("SELECT * FROM tbl_schedule");
          $statement->execute();
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      }  
      foreach ($result as $row) {
        $output .= '<option value="">--SELECT--</option><option value="'.$row["date"].'">'.$row["date"].'</option>';  
      }  
      echo $output;  
 }  
 ?>  