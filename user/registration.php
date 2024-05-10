    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="registration.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
        <div class="title">Registration</div>
        <form action="registerAction.php" method="post">
        <div class="user-details">
            <div class="input-box">
                <span class="details"><i class="fa-solid fa-user"></i> Username</span>
                <input type="text" id="user" name="r_username" placeholder="Enter username" required>
            </div>
            <div class="input-box">
                <span class="details"><i class="fa-solid fa-envelope"></i> Email</span>
                <input type="email" id="email" name="r_email" placeholder="Enter Email" required>
            </div>
            <div class="input-box">
                <span class="details"><i class="fa-solid fa-mobile-screen"></i> Phone Number</span>
                <input type="text" id="mobinum" name="r_mobile" placeholder="Enter Number (+088)" required>
            </div>
            <div class="input-box">
                <span class="details"><i class="fa-solid fa-eye" aria-hidden="true" style="cursor: pointer" id="eye" onclick="toggle()"></i> Password</span>
                <input type="password" id="passw" name="r_pass" placeholder="Enter Credentials" required>
            </div>
            <div class="input-box">
                <span class="details"><i class="fa-solid fa-eye" aria-hidden="true" style="cursor: pointer" id="r_eye" onclick="toggle()"></i> Confirm Password</span>
                <input type="password" id="r_passw" name="r_con_pass" placeholder="Verify Credentials" required>
            </div>
            </div>
            <div class="button">
                <input type="submit" value="Register" name="submit">
                <span>Already registered? <a href="login.php">login</a></span>
            </div>
        </form>
        </div>
        <script> 
         var state = false;
         function toggle(){
            if(state){
              document.getElementById("passw").setAttribute("type", "password");
              document.getElementById("r_passw").setAttribute("type", "password");
              document.getElementById("eye").style.color='#7a797e';
              document.getElementById("r_eye").style.color='#7a797e';
              state = false;
            }
            else{
              document.getElementById("passw").setAttribute("type", "text");
              document.getElementById("r_passw").setAttribute("type", "text");
              document.getElementById("eye").style.color='#5887ef';
              document.getElementById("r_eye").style.color='#5887ef';
              state = true;
            }
            
         }
        </script>
    </body>
    </html>

