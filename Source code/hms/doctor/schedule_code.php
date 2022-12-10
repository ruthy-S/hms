<?php
ob_start();
session_start();
include("../admin/inc/config.php");
include("../admin/inc/functions.php");
include("../admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message='';

// Check if the user is logged in or not
if(!isset($_SESSION['doctor'])) {
	header('location: login.php');
	exit;
}

if(isset($_POST['form1'])) {
	$valid = 1;
	
	if($valid == 1) {

    $statement = $pdo->prepare("SELECT * FROM tbl_doctor WHERE doctor_id=?");
    $statement->execute(array($_POST['doctor_id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);						
    foreach ($result as $row) {
        $doctor_name = $row['name'];
    }

	$statement = $pdo->prepare("INSERT INTO tbl_schedule (doctor_id,doctor_name,date,start_time,end_time) VALUES (?,?,?,?,?)");
	$statement->execute(array($_POST['doctor_id'],$doctor_name,$_POST['date'],$_POST['start_time'],$_POST['end_time']));

    $_SESSION['status'] ="Scheduled successfully!";
    $_SESSION['status_code'] ="success";
    header('Location: schedule.php');
	}
}

?>