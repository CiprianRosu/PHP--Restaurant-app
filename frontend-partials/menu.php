<?php include('config/consts.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caffe Luccas</title>

    <!-- Link our CSS file -->
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
  <style>
  body {
    font: 400 15px/1.8 'Roboto', sans-serif;
    color: #777;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
          
    font-size: 20px;
    color: #111;
  }
  .container {
    padding: 80px 120px;
  }
  



  .carousel-inner img {
  
    width:50%; /* Set width to 100% */
    height:80%;
    /* margin: auto; */
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  
 

  .btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
  }

  
  
  .navbar {
    font-family: 'Roboto', sans-serif;
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    font-size: 15px !important;
    
    
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  
 
  
  
  </style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Navbar Section Starts Here -->
    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    <strong> <a class="navbar-brand" href="#myPage">Caffe Luccas</a></strong>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo SITEURL; ?>">Home</a></li>
        <li><a href="<?php echo SITEURL; ?>categories.php">Menu</a></li>
        <li><a href="<?php echo SITEURL; ?>reservation.php">Reservation</a></li>
        <li><a href="<?php echo SITEURL; ?>contact.php">Contact</a></li>
        <li><a href="<?php echo SITEURL; ?>order-details.php">My cart</a></li>
        
      </ul>
    </div>
  </div>
</nav>
    <!-- Navbar Section Ends Here -->