<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </style>
    </head>
    <body>

<div class="row justify-content-md-center">
<div class="col col-lg-2">
    <form action="" method="post" class="loginpage">
    <h1>Log In</h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="InputEmail" placeholder="Enter email" required>
        </div>
   
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="Password1" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button><br><br><br>
        <span><a href='register.php' class='btn btn-info' role='button' aria-pressed='true'>Register</a></span>
    </form>


            <?php
                include("connection.php");

                if (isset($_POST['submit'])) {
                    $email=$_POST['InputEmail'];
                    $pwd1=$_POST['Password1'];

                $query = 'SELECT PassWord, user_id FROM user WHERE email = ?';
                $stmt = $conn->prepare( $query );
                $stmt->bind_param("s", $email );
                $stmt->execute();

                $stmt->bind_result( $PassWord, $user_id );
                $stmt->fetch();

                if ( password_verify( $_POST['Password1'], $PassWord ) ) {
                    header("location:welcom.html");
                } else {
                    echo 'No Match';
                }

            } 
            

                $conn->close();
            ?>
        </div>
        </div>
    </body>