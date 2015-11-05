<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start() ; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>My Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
</head>

<body>
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
                        	<li><a href="#">Dr. Who</a></li>
                            <li><a href="#">Dr. Chase</a></li>
                            <li><a href="#">Dr. Run</a></li>
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
              <li class="active">Categories</li>
            </ol>
        
              <h1>Buy cards Test</h1>
                <?php 
				
				$subpdtid = 6205; // your product ID
				$submittedref = $_POST['txnref'] ; // unique ref I generated for the trans sent back by interswitch can also be saved in session once generated and can be retrieved for use here
				$submittedamt = $_SESSION['amt4hash'] ; // same as amount sent in confirm.php
			
				
	$nhash = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F" ; // the mac key sent to you
	$hashv = $subpdtid.$submittedref.$nhash;  // concatenate the strings for hash again
	$thash = hash('sha512',$hashv);
// $credentials = "mithun:mithun";
	
	 $parami = array(
        "productid"=>$subpdtid,
        "transactionreference"=>$submittedref,
        "amount"=>$submittedamt
		); 
	$ponmo = http_build_query($parami) . "\n";
		
		//$url = "https://stageserv.interswitchng.com/test_paydirect/api/v1/gettransaction.xml?$ponmo";// xml
		$url = "https://stageserv.interswitchng.com/test_paydirect/api/v1/gettransaction.json?$ponmo"; // json
	  
		//note the variables appended to the url as get values for these parameters
		$headers = array(
		"GET /HTTP/1.1",
		"User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1",
		//"Content-type:  multipart/form-data",
		//"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8", 
		"Accept-Language: en-us,en;q=0.5",
		//"Accept-Encoding: gzip,deflate",
		//"Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7",
		"Keep-Alive: 300",      
		"Connection: keep-alive",
		//"Hash:$thash",
		"Hash: $thash " );
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 //curl_setopt($ch,CURLOPT_POSTFIELDS,$ponmo);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
  curl_setopt( $ch, CURLOPT_POST, false );
 // dont use this on production enviroment
    //curl_setopt($ch, CURLOPT_USERAGENT, $defined_vars['HTTP_USER_AGENT']); 
  	

$data = curl_exec($ch); 
 if (curl_errno($ch)) { 
  print "Error: " . curl_error($ch);
    }
 else {  
 // Show me the result
 //	$json = simplexml_load_string($data);
	$json = json_decode($data, TRUE);
 //var_dump($data);
 curl_close($ch);
 print_r($json);
 //echo ($json['ResponseCode']);  
 //echo ($json['ResponseDescription']);
 // loop through the array nicely for your UI
  }?>
  
  <h2>Query Transaction</h2>
 
				<table width="400" align="center">
<tbody><tr><td width="149"></td></tr>
	

</td>
</tr>


<tr>
 <td colspan="2" style="text-align:center"> <label for="student"></label>
 
 </td>
</tr>
</tbody></table>
			<div class="thumbnail">
                        <div class="caption">
                            <h4><span class="glyphicon glyphicon-pushpin"></span> <?php echo ($json['ResponseCode']); ?> </h4>
                            <p><?php echo ($json['ResponseDescription']);?></p>
                            <p><a href="#" class="btn btn-info" data-toggle="tooltip" title="Read more">Read more >></a></p>
                        </div>
                    </div>
			
                   
				<?php 
				if ($json['ResponseCode'] == "00"){?>
	<img src="css/thankyou.jpg" alt="ok" />
					   <!-- nested row 3a: callouts -->
         <div class="clearfix visible-xs visible-lg"></div>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                	<div class="thumbnail">
                        <div class="caption">
                            <h4><span class="glyphicon glyphicon-pushpin"></span> <?php echo ($json['ResponseCode']); ?> </h4>
                            <p><?php echo ($json['ResponseDescription']);?></p>
                            <p><a href="#" class="btn btn-info" data-toggle="tooltip" title="Read more ">Read more >></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                     <div class="thumbnail">
                        <div class="caption">
                            <h4><span class="glyphicon glyphicon-ok"></span> Checkups</h4>
                                <p><a href="#" class="btn btn-info" data-toggle="tooltip" title="Read more about checkups">Read more >></a></p>
                    	</div>
                    </div>
                </div>
                <div class="clearfix visible-md visible-xs"></div>
                <div class="col-lg-3 col-xs-6">
                	<div class="thumbnail">
                        <div class="caption">
                            <h4><span class="glyphicon glyphicon-heart"></span> Seniors</h4>
                             <p><a href="#" class="btn btn-info" data-toggle="tooltip" title="Read more about senior pets">Read more >></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                	<div class="thumbnail">
                        <div class="caption">
                    		<h4><span class="glyphicon glyphicon-cutlery"></span> Diets</h4>
                    		<p><a href="#" class="btn btn-info" data-toggle="tooltip" title="Read more about diet plans">Read more >></a></p>
                    	</div>
                    </div>
                 </div>
            </div><!-- end nested row 3a -->
			<?php } else {?>
	<img src="css/notok.jpg" alt="not ok" />
<?php } ?>
			
        </article>
        <aside class="col-lg-3 col-sm-4 col-lg-pull-9 col-sm-pull-8">
        	<h3>About Our Services</h3>
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
         <p><small>Wisdom Pet Medicine is a training brand owned by <a href="https://myeverlasting.net">ESSL</a></small></p>
    </footer>

</div> <!-- end container -->

<!-- javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
		$('a.btn-info').tooltip()
	</script>
</body>
</html>
