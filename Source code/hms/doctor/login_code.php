<?php
ob_start();
session_start();
include("../admin/inc/config.php");
include("../admin/inc/functions.php");
include("../admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message='';


if(isset($_POST['form1'])) {
        
    if(empty($_POST['doctor_id'])) {
        $error_message = 'Doctor ID can not be empty<br>';
        header('Location: login.php');
    } else {
		$doctor_id = $_POST['doctor_id'];
    	$statement = $pdo->prepare("SELECT * FROM tbl_doctor WHERE doctor_id=?");
    	$statement->execute(array($doctor_id));
    	$total = $statement->rowCount();    
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);    
        if($total==0) {
            $_SESSION['status'] ="Doctor ID does not match";
            $_SESSION['status_code'] ="warning";
            header('Location: login.php');
        } else {       
            foreach($result as $row) { 
                $row_doctor_id = $row['doctor_id'];
            }
        
            if( $row_doctor_id != $doctor_id ) {
                $_SESSION['status'] ="Doctor ID does not match";
                $_SESSION['status_code'] ="warning";
                header('Location: login.php');
            } else {       
            
				$_SESSION['doctor'] = $row;
                $_SESSION['status'] ="Logined Successfully";
                $_SESSION['status_code'] ="success";
                header("location: index.php");
            }
        }
    }
    
}
?>