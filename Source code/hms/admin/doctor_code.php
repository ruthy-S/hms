<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();

// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
}

if(isset($_POST['form1'])) {
	$valid = 1;
	

	if($valid == 1) {

	// getting auto increment id for photo renaming
	$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_doctor'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row) {
		$ai_id=$row[10];
	}

	$random_number = round(microtime(true));

	$doctor_id = 'DR'.$random_number.''.$ai_id;

	$statement = $pdo->prepare("INSERT INTO tbl_doctor (name,phone,qualification,department,doctor_id) VALUES (?,?,?,?,?)");
	$statement->execute(array($_POST['name'],$_POST['phone'],$_POST['qualification'],$_POST['department'],$doctor_id));

    $_SESSION['status'] ="Doctor added successfully!";
    $_SESSION['status_code'] ="success";
    header('Location: doctor.php');
	}
}

?>