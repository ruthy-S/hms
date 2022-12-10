<?php
require_once('security.php');

$output = '';  
 if(isset($_POST['department']))  
 {  
      if($_POST['department'] != '') {  
          $statement = $pdo->prepare("SELECT * FROM tbl_doctor WHERE department=?");
          $statement->execute(array($_POST['department']));
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      }  
      else {  
          $statement = $pdo->prepare("SELECT * FROM tbl_doctor");
          $statement->execute();
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      }  
      foreach ($result as $row) {
        $output .= '<option value="">--SELECT--</option><option value="'.$row["doctor_id"].'">Dr. '.$row["name"].'</option>';  
      }  
      echo $output;  
 }  
 ?>  