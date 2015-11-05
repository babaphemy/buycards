<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" ng-app="webpayApp">
<?php session_start();?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
	<!-- load angular, nganimate, and ui-router -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.10/angular-ui-router.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-animate.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="js/app.js"></script>
	<script src="js/controllers.js"></script>
	

</head>

<body ng-app="iswapp">

<div class="container">
	<!-- row 1: navigation -->
    <div class="row">
    	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="glyphicon glyphicon-arrow-down"></span>
                  MENU 
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown">About <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="#">Webpay</a></li>
                            <li><a href="#">Quickteller</a></li>
                            <li><a href="#">Quickteller Service</a></li>
                        </ul>                    
                    </li>
                    <li class="active"><a href="#">Services</a></li>
                    <li><a href="#">Photo Gallery</a></li>
                    <li><a href="#">Contact</a></li>  
                </ul> 
            </div>
         </nav> 
    </div>
   
    <!-- row 2: header -->
    <header class="row">
    	<div class="col-lg-6 col-sm-5">
        	<a href="index.html"><img src="img/logo.png" alt="Wisdom Pets. click for home." class="img-responsive"></a>
        </div>
    	<div class="col-lg-6 col-sm-7">
        	<img src="img/animals.jpg" alt="" class="hidden-xs img-responsive">
        </div>
    </header>
    
    <!-- row 3: article/aside -->
    <div class="row">
    	<article class="col-lg-offset-1 col-sm-offset-1 col-lg-8 col-sm-7 col-lg-push-3 col-sm-push-4">
        
            <ol class="breadcrumb">
              <li><a href="#">Home</a> <span class="glyphicon glyphicon-circle-arrow-right"></span></li>
              <li><a href="#">Services</a> <span class="glyphicon glyphicon-circle-arrow-right"></span></li>
              <li class="active">Vaccinations</li>
            </ol>
        
            <h1>Welcome</h1>
		                 <!-- nested row 3a: callouts -->
         <div class="clearfix visible-xs visible-lg"></div>
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                	<div class="thumbnail">
                        <div class="caption">
                            <h4><span class="glyphicon glyphicon-pushpin"></span> Buy Card<p>(<span style="color:#F00">Enter amount below</span>)</p></h4>
                            <p>Enter amount below click to proceed to gateway.</p>
                             <?php 
				$tref = mt_rand(100000,999999);
		        $_SESSION['genref'] = $tref;
				?>
                <form method="post" action="confirm.php">
                 <input type="text" value="5000" name="amount" />
                
                            
                            <p><button type="submit" class="btn btn-info" data-toggle="tooltip" title="Read more about vaccines">Buy Now >></button></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                     <div class="thumbnail">
                        <div class="caption">
                            <h4><span class="glyphicon glyphicon-ok"></span> Transactions</h4>
                           <ul>
                               <li>First deposit</li>
                           </ul>
                    	</div>
                    </div>
                </div>
                <div class="clearfix visible-md visible-xs"></div>
                <div class="col-lg-4 col-xs-6">
                	<div class="thumbnail">
                        <div class="caption">
                            <h4><span class="glyphicon glyphicon-heart"></span> Favorites</h4>
                            <p>Your most recent orders </p>
                            <p><a href="#" class="btn btn-info" data-toggle="tooltip" title="Read more about senior pets">Read more >></a></p>
                        </div>
                    </div>
                </div>
              
            </div><!-- end nested row 3a -->
        </article>
        <aside class="col-lg-3 col-sm-4 col-lg-pull-9 col-sm-pull-8">
        	<h3><a href="index.php">Buy Cards DEMO</a></h3>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#">Categories</a></li>
                <li><a href="#">Checkups</a></li>
                <li><a href="#">Seniors</a></li>
                <li><a href="#">Diets</a></li>
            </ul> 
         </aside>
    

        </div><!-- end row 3 -->
    
    <!-- row 4 -->
    <footer class="row">
         <p><small>This not a real veterinary medicine site, and is not meant to diagnose or offer treatment. Please see your veterinarian for all matters related to your pet's health.</small></p>
         <p><small>Demo Project ownedy <a href="#">ESSL </a></small></p>
    </footer>

</div> <!-- end container -->

<!-- javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
		$('a.btn-info').tooltip()
	</script>
	<script src="js/angular.min.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/app.js"></script>
	<script src="js/WebpayController.js"></script>
	</body>
</html>