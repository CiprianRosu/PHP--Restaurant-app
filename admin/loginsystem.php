
<?php include('../config/consts.php'); ?>

<html>

<head>
    <title>Login - Caffe Luccas</title>
    <link rel="stylesheet" href="../css/admin.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    

    <link rel="icon" href="Favicon.png">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<br>
<br>
<br>
<br>
<br>
<body>
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">


    <?php
  
    if(isset($_SESSION['login-failed']))
    {
        echo $_SESSION['login-failed'];
        unset($_SESSION['login-failed']);
    }

    
    
    ?>



    
    <form action="" method="POST" class="text-center">
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Username</label>
            <div class="col-md-6">
                <input type="text" name="username" placeholder="Username" class="form-control" required autofocus><br><br>
</div>

          <label class="col-md-4 col-form-label text-md-right">Password</label>
          <div class="col-md-6">
    <input type="password" name="password" placeholder="Password" class="form-control"><br><br>
    </div>
         </div>
        
    <button type="submit" name="submit" value="Login" class=" btn btn-primary">Login</button>

    
    
</form>

    
    </div>

    </div>
            </div>
        </div>
    </div>
    </div>
</main>
</body>

</html>

<?php
//verify if the user pressed the button ot not
if(isset($_POST['submit']))

{
    //fetch data from html login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //verify in the database if username and pass exists
    $query ="SELECT * FROM `admin` WHERE surname='$username' AND password='$password'";
    
    //query execution
    $result=mysqli_query($connection, $query);
    
    
    //the below function return the numeber of the rows to check if the user exists in the database or not
    $count = mysqli_num_rows($result);

    if($count==1)
    {
        
        // verify if the user is looged in and logut is going to unset it
        $_SESSION['user'] = $username;
        //Dashboard redirection
        header('location:'.SITEURL.'admin/');
    }
    else
    {
        //the user is not usable in the database and the login process is not succesful
        $_SESSION['login-failed'] = "<div class='red text-center'>Wrong pass or username!</div>";
        //Dashboard redirection
        header('location:'.SITEURL.'admin/loginsystem.php');

    }
}



?>