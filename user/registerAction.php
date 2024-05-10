        <?php
        include 'config.php';

     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;

     function sendEmail($r_email, $v_code){
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        require 'PHPMailer/Exception.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'ayonshirsho@gmail.com';
            $mail->Password   = 'ehjducqqyyexafme';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
            $mail->Port       = 465;                                     
        
            $mail->setFrom('ayonshirsho@gmail.com', 'Ayon');
            $mail->addAddress($r_email);
        
            $mail->isHTML(true);
            $mail->Subject = 'Email verification from Ayon';
            $mail->Body    = "Thanks for registration!
            Click the link below to verify the email address.
            <a href='http://localhost/4THYEAR/verify.php?r_email=" . urlencode($r_email) . "&v_code=" . urlencode($v_code) . "'> Verify your Email.</a>";
        
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
        
        $r_username = $_POST['r_username'];
        $r_email = $_POST['r_email'];
        $r_mobile = $_POST['r_mobile'];
        $r_pass = $_POST['r_pass'];
        $r_con_pass = $_POST['r_con_pass'];

        $username_pattern = "/^[A-Za-z .]{3,20}$/";
        $phone_pattern = "/^(?:\+88)?-?01[3-9]\d{8}$/";
        $email_pattern = "/^(cse|eee)_\d{10}@lus\.ac\.bd$/"; 
        $pass_pattern = "/^(?=.*\\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#\$!%&*()]).{6,20}$/";


        $v_code= bin2hex(random_bytes(16));
        $insertQuery = "INSERT INTO `register`(`db_username`, `db_email`, `db_mobile`, `db_pass`,`verification_code`,`is_verified`) VALUES ('$r_username','$r_email','$r_mobile','$r_pass','$v_code','0')";
        $duplicate_username = mysqli_query($conn,"SELECT * FROM `register` WHERE db_username='$r_username'");
        if(mysqli_num_rows($duplicate_username)>0){
            echo "<script>alert('username already taken!')</script>";
            echo "<script>location.href = 'registration.php' </script>";
        }
        else if(!preg_match($username_pattern,$r_username)){
            echo "<script>alert('username incorrect! accept only char (3-20)')</script>";
            echo "<script>location.href = 'registration.php' </script>";
        }
        else if(!preg_match($email_pattern,$r_email)){
            echo "<script>alert('wrong email')</script>";
            echo "<script>location.href = 'registration.php' </script>";
        }
        else if(!preg_match($phone_pattern,$r_mobile)){
            echo "<script>alert('enter correct phone number')</script>";
            echo "<script>location.href = 'registration.php' </script>";
        }
        else if(!preg_match($pass_pattern,$r_pass)){
            echo "<script>alert('enter password with upper-lower-special char(6-20) ')</script>";
            echo "<script>location.href = 'registration.php' </script>";
        }
        else if($r_pass!=$r_con_pass){
            echo "<script>alert('pass and con pass not same ')</script>";
            echo "<script>location.href = 'registration.php' </script>";
        }
        else{
            if(mysqli_query($conn,$insertQuery) && sendEmail($_POST['r_email'],$v_code)){
                // die("registration failed!!");
                echo "<script>alert('registration successful!! check mail to confirm email')</script>";
                echo "<script>location.href='login.php'</script>";
            }
            else{
                echo "
                        <script>
                        alert('Cannot run update query: " . mysqli_error($conn) . "');
                        location.href='registration.php';
                        </script>
                    ";
            }  
        }
        