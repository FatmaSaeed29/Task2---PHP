<?php 
ob_start();
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])){
    $Full_Name = filter_var($_POST["name"],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST["password"],FILTER_SANITIZE_NUMBER_INT);
    $image = filter_var($_POST["image"],filter);
    $_SESSION["name"] = $Full_Name;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["image"] = $image;

   
    if(isset($_FILES['image'])){$errors= array();

        $file_name = $_FILES['image']['name'];
      
        $file_size = $_FILES['image']['size'];
      
        $file_tmp = $_FILES['image']['tmp_name'];
      
        $file_type = $_FILES['image']['type'];
      
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152) {
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp,"images/".$file_name);
           echo "Success";
           $img=$_POST["image"];
           $ex=explode(".", $img);
           print_r (end($ex));
        }else{
           print_r($errors);
        }    } 
   
        

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Registration Form</title>
    
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div>
                </div>
                <div class="regForm">
                    <h1>Register Here</h1>
                    <form method="POST" action="profile.php" class="needs-validation" 
                    enctype="multipart/form-data" novalidate>
                        <div class="form-group">                     
                        <label for="validationName">Full name</label>
                        <input type="text" class="form-control" id="validationName" placeholder="Full name" name="name" required>
                            <div class="invalid-feedback">
                                Please Enter Your Name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            <div class="invalid-feedback">
                                Please Enter Your Email.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                            <div class="invalid-feedback">
                                Please Enter Your Password.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choose An Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" required>
                            <div class="invalid-feedback">
                                Please Choose An Image.
                            </div>
                        </div>    
                        <input type="submit" class="btn btn-primary" name="submit">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();
    </script>    
  </body>
</html>
 
<?php
ob_end_flush();
?> 