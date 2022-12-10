<?php require_once('security.php'); ?>

<?php
if(isset($_POST['form1'])) {
        
    if(empty($_POST['phone']) || empty($_POST['password'])) {
      $_SESSION['status'] ="Please Enter Your Phone number and Password";
      $_SESSION['status_code'] ="warning";
      header("location: login.php");
    } else {
        
        $phone = strip_tags($_POST['phone']);
        $password = strip_tags($_POST['password']);

        $statement = $pdo->prepare("SELECT * FROM tbl_patient WHERE phone=?");
        $statement->execute(array($phone));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $row_password = $row['password'];
            header("location: login.php");
        }

        if($total==0) {
          $_SESSION['status'] ="Phone number does not match";
          $_SESSION['status_code'] ="warning";
          header("location: login.php");
        } else {

            if( $row_password != md5($password) ) {
                $_SESSION['status'] ="Passwords do not match";
                $_SESSION['status_code'] ="warning";
                header("location: login.php");
            } else {
                $_SESSION['patient'] = $row;
                header("location: index.php");
            }
            
        }
    }
}
?>