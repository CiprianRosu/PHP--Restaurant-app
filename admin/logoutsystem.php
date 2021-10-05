<?php

include('../config/consts.php');

// the sess is destroyd
session_destroy();

// redirection to loginsystem

header('location:'.SITEURL.'admin/loginsystem.php');

?>