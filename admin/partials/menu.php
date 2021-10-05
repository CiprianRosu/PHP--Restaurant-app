<?php 

include('../config/consts.php');
include('loginsystem-verification.php');

?>


<html>
<head>
<style>
        .row .col {
            height: 150px;
            width:250px;
            background: #343A40;
        }
        .color {
            color: white;
        }

        p {
            color:white;
        }

        ul li a {
            color: white;
    }
    
    </style>
<title>Caffe Luccas - Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 

</head>
<body>





<nav class="navbar navbar-expand-sm bg-dark justify-content-center">
    
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin-management.php">Admin</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" href="category-management.php">Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reservation-management.php">Reservation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="food-management.php">Food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="offers-management.php">Offers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order-management.php">Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logoutsystem.php">Logout</a>
            </li>



        </ul>

    
</nav>