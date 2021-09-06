<?php
    session_start();
    include "conn.php";
    /*$fname="";
    $email="";
    $password="";
    $cpassword="";*/
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $cpassword=$_POST['cpassword'];
       
        if($password=$cpassword){
            $emaildup="SELECT email from Crudtable where email='$email'";
            $res=mysqli_query($con,$emaildup);
            if(mysqli_num_rows($res)){
              $row=mysqli_fetch_assoc($res);
              if($email==$row['email']){
                echo '<a href="Login.php" class ="btn  btn-danger">Email already exists try Loging in</a>';
              }    
            }
            $q="INSERT into crudtable (full_name,email,password) values ('$fname','$email','$password');";
            $query=mysqli_query($con,$q) or trigger_error($con); 
            header("location:Login.php") ;
        }
        else{
            echo  '<a href="register.php" class ="btn  btn-danger">Passwords do not match</a>'; 
            //header("location:register.php") ;
        }
       
         
    }  
        // if(empty($fname)){
        //     error['f']="Name required";
        // }
        // if(empty($email)){
        //     error['e']="Email required";
        // }
        // if(empty($password)){
        //     error['p']="Password required";
        
        // $q="Insert into crudtable(full_name,email,password) values ('$fname','$email'$password');";
        // $query=mysqli_query($q,$con) or trigger_error($con); 
        // header(location:"Login.php") ;  
      
    

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="index2.php"><b>Admin</b></a>
        </div>

        <div class=" card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form method="post">
                    <div class="input-group mb-3">
                        <input name="fname" type=" text" class="form-control" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                                <p class="text-danger"> <?php if(isset($errors['f'])){ echo $errors['e'];}?></p>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" pattern = "^[^\s@]+@[^\@]+\[^\s@]+$" oninvalid="alert('mail should contain '@' and '.'')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                <p class="text-danger"> <?php if(isset($errors['e'])) {echo $errors['e'];} ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="pass" type="password" class="form-control" placeholder="Password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$"  oninvalid="alert('mail should contain )>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                <p class="text-danger"> <?php if(isset($errors['p'])){ echo $errors['e'];} ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="cpassword">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="submit" >Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="login.html" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
 
    
</body>

</html>