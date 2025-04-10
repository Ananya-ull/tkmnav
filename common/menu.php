<?php
session_start();
$title="";
?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>TKM NAVIGATOR</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="../common/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">

<div class="sidebar"  style="background-color:#074051 !important;">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <center>
                  <span style="font-size:20px;color:#FFF;margin-top:12px; font-weight: bold;"> TKM NAVIGATOR <br><span style="font-size:12px;color:#000;"> 
                </span>
                </span>
               </center>
            </div>

            <ul class="nav">
                
                
                <li class="active">
                    <a href="../dashboard/dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Home</p>
                    </a>
                </li>
                
                <li>
                    <a href="../location/select.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Location</p>
                    </a>
                </li>
                
                 <li>
                    <a href="../navigation/select.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Navigation</p>
                    </a>
                </li>
                
                
             
                
              
                 <li>
                    <a href="../login/logout.php">
                        <i class="pe-7s-bell"></i>
                        <p>Log Out</p>
                    </a>
                </li>
               
				
            </ul>
    	</div>
    </div>
    <div class="main-panel">
    
    
    
    <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <br>
                    <?php //echo $_SESSION['company_name']; ?>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            
                               
								<p class="hidden-lg hidden-md"> <?php echo $_SESSION['company_name']; ?></p>
                            
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                      
                     
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>