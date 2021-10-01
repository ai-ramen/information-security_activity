<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </style>
    </head>
    <body>

<div class="row justify-content-md-center">
<div class="col col-lg-2">
    <form action="" method="post" class="loginpage">
        <h1>Register</h1>
        <div class="form-group">
            <label for="exampleInputEmail1">First name</label>
            <input type="text" class="form-control" name="InputFname" placeholder="Enter first name" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Last name</label>
            <input type="text" class="form-control" name="InputLname" placeholder="Enter last name" required>
        </div>    

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="InputEmail" placeholder="Enter email" required>
        </div>
   
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="Password1" placeholder="Password" required>
        </div>
  
        <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" name="Password2" placeholder="Confirm Password" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>


            <?php
                include("connection.php");

                if (isset($_POST['submit'])) {
                    $fname=$_POST['InputFname'];
                    $lname=$_POST['InputLname'];
                    $email=$_POST['InputEmail'];
                    $pwd1=$_POST['Password1'];
                    $pwd2=$_POST['Password2'];
                    $hashedpwd=password_hash($pwd1, PASSWORD_DEFAULT);

                    if($pwd1==$pwd2){
                        $prepare = $conn->prepare("INSERT INTO user(fname,lname,email,PassWord) VALUES (?,?,?,?)");
                        $prepare->bind_param("ssss",$fname,$lname,$email,$hashedpwd);
            
                        if(!$prepare->execute()) {
                            echo "Error";
                        }else{
                            echo "Successfully Registered";
                            echo "<a href='login.php' class='btn btn-secondary btn-lg active' role='button' aria-pressed='true'>Link</a>";

                        }
                
                }else{
                    echo "Password Not Match";
                }
                } 
            

                $conn->close();
            ?>
        </div>
        </div>
    </body>