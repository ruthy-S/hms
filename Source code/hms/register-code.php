<?php require_once('security.php'); ?>

<?php
if (isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['name'])) {

        $valid = 0;
        $_SESSION['status'] ="Name can not be empty";
        $_SESSION['status_code'] ="warning";
        header("location: register.php");
    }

    if(strlen($_POST['phone'])<10) {
        $valid = 0;
        $_SESSION['status'] ="Phone number should be 10 digit";
        $_SESSION['status_code'] ="warning";
        header("location: register.php");
    } else {
        $statement = $pdo->prepare("SELECT * FROM tbl_patient WHERE phone=?");
        $statement->execute(array($_POST['phone']));
        $total = $statement->rowCount();                            
        if($total) {
            $valid = 0;
            $_SESSION['status'] ="Phone number already exists";
            $_SESSION['status_code'] ="warning";
            header("location: register.php");
        }
    }

    if( empty($_POST['password']) || empty($_POST['re_password']) ) {
        $valid = 0;
        $_SESSION['status'] ="Password can not be empty";
        $_SESSION['status_code'] ="warning";
        header("location: register.php");
    }

    if( !empty($_POST['password']) && !empty($_POST['re_password']) ) {
        if($_POST['password'] != $_POST['re_password']) {
            $valid = 0;
            $_SESSION['status'] ="Passwords do not match";
            $_SESSION['status_code'] ="warning";
            header("location: register.php");
        }
    }

    if($valid == 1) {

        $random_number = round(microtime(true));

	    $patient_id = ''.$random_number.''.$ai_id;
        
        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tbl_patient (name,phone,address,patient_id,password) VALUES (?,?,?,?,?)");
        $statement->execute(array($_POST['name'],$_POST['phone'],$_POST['address'],$patient_id,md5($_POST['password'])));

        if(empty($_POST['phone']) || empty($_POST['password'])) {
            $_SESSION['status'] ="Email and/or Password can not be empty";
            $_SESSION['status_code'] ="warning";
        } else {
            $phone = strip_tags($_POST['phone']);
            $password = strip_tags($_POST['password']);

            $statement = $pdo->prepare("SELECT * FROM tbl_patient WHERE phone=?");
            $statement->execute(array($phone));
            $total = $statement->rowCount();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row) {
                $row_password = $row['password'];
                $phone = $row['phone'];
            }

            if($total==0) {
                $_SESSION['status'] ="Phone number does not match";
                $_SESSION['status_code'] ="warning";
                header("location: register.php");
            } else {

                if( $row_password != md5($password) ) {
                    $_SESSION['status'] ="Passwords do not match";
                    $_SESSION['status_code'] ="warning";
                    header("location: register.php");
                } else {
                    $_SESSION['patient'] = $row;
                    header("location: index.php");
                }
                
            }
        }
    }
}
?>