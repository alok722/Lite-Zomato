<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./images/favicon.ico">

    <title>Let's Order</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- Custom styles for this template -->
    <link href="./css/list.css" rel="stylesheet">
      
<!-- PHP Codes-->
      <?php
        $con=mysql_connect('localhost','root','');
            if(!$con)
            {
                die('could not connect: '.mysql_error());
            }
        mysql_select_db("hotel",$con);
      
        $loc=$_SESSION['loc'];
        $res=mysql_query("select restro_name from restro where restro_loc='$loc' ");
        
//      Functionality to Search for restaurants in a city
      
        if(isset($_POST['search']))
        {
            
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $resname=$_POST['resname'];
                $valid=mysql_query("select restro_name from restro where restro_name='$resname'",$con);
                if(mysql_num_rows($valid)==0)
                {
                   $msg="Restaurant Not Available in Database yet.";
                   echo "<script type='text/javascript'>alert('$msg');</script>";
                }
                else
                {
                 $_SESSION['resname']=$resname;
                 header("location:detail2.php");   
                }
            }
        }
      ?>
  </head>

  <body>
    <div style="background-color: #171a29; ">
        <!-- NAVBAR -->
      <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php" style="font-family: cursive; color: #171a29;"><b><i>Let's Order</i></b></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php"><b>Home</b></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <h2 style="text-align: center; color: #f1f1f1; font-weight: bold;">Restaurants In <?php echo "$loc"; ?></h2>
        
<!--        Search Bar for restaurants-->
    <form method="post">
	    <div style="text-align: center; margin: 20px; padding-bottom: 20px;">
	    	<input id="search" type="text" name="resname" placeholder="Search Restaurants" style="border: 0; width: 200px; text-align: center; color: #f1f1f1;outline: 0;background: transparent;border-bottom: 1px solid white;" required>
	    	<input type="submit" name="search" value="Search" class="btn btn-default" style="margin-left: 10px;">
		</div>
	</form>
</div>

      
        
    <div class="container">
      <div class="row" style="margin-top: 20px;">
          <?php
      while($row=mysql_fetch_assoc($res))
      {
      ?>
        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6" >
          <div class="card" style="width: 18rem;">
            <img class="card-img-top img-responsive" src="./images/18.jpg" alt="Card image cap">
            <div class="card-body">
            <form method="post" action=<?php print "\"details.php?name=".$row['restro_name']."\"";?>>    
              <h4 class="card-title"><?php echo $row['restro_name'];?></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                
                    <input type="submit" name="detail" value="Learn More" class="btn btn-primary bbtn-sm" style="margin-bottom: 10px;">
                </form>
            </div>
          </div> 
        </div>
      <?php
      }
      ?>
      </div>
     </div>
<div class="container" style="margin-top:20px;">
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
  </div>



    <!-- Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
