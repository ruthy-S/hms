<?php
require_once('security.php');

function SplitTime($StartTime, $EndTime, $Duration="15"){
    $ReturnArray = array ();// Define output
    $StartTime    = strtotime ($StartTime); //Get Timestamp
    $EndTime      = strtotime ($EndTime); //Get Timestamp

    $AddMins  = $Duration * 60;

    while ($StartTime <= $EndTime) //Run loop
    {
        $ReturnArray[] = date ("h:i a", $StartTime);
        $StartTime += $AddMins; //Endtime check
    }
    return $ReturnArray;
}

$output = '';  
 if(isset($_POST['doctor']))  
 {  
      if($_POST['doctor'] != '') {  
          $statement = $pdo->prepare("SELECT * FROM tbl_schedule WHERE doctor_id=? AND date=?");
          $statement->execute(array($_POST['doctor'],$_POST['date']));
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      }  
      else {  
          $statement = $pdo->prepare("SELECT * FROM tbl_schedule");
          $statement->execute();
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      }  

        foreach ($result as $row) {
            $start_time = $row['start_time'];
            $end_time = $row['end_time'];
        }  

        $data = SplitTime($start_time, $end_time, "15");
        foreach ($data as $value) {
            $output .= '<option value="'.$value.'">'.$value.'</option>';
        }

      echo $output;  
 }  
 ?>  