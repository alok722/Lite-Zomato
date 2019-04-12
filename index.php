<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Let's Order</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="ie-emulation-modes-warning.js"></script>

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
      
    <!-- php code -->
      <?php
      
        session_start();
      
        $con=mysql_connect('localhost','root','');
        if(!$con)
        {
            die('could not connect: '.mysql_error());
        }
        mysql_select_db("hotel");
      
//      Setting Function of Search button of Location Dropdown
        if(isset($_POST['search']))
        {
            $loc=$_POST['loc'];
            $_SESSION['loc']=$loc;
            header("location:list.php");
            
        }
      
//      Sign Up Form
        if(isset($_POST['signup_submit']))
        { 
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $u_name=$_POST['signup_name'];
                $u_id=$_POST['signup_email'];
                    
                $sign_up="insert into user values('$u_name','$u_id')";
                
                $res=mysql_query($sign_up,$con);
                if(!$res)
                {
                    $message1 = "User Already Exist";
                    echo "<script type='text/javascript'>alert('$message1');</script>";
                }
                else
                {
                    $message = "User Subscribed Successfully";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
        }
      ?>
  </head>

  <body>
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
                <li><a href="#about"><b>About Us</b></a></li>
                <li><a href="#contact"><b>Developer</b></a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#signup" data-toggle="modal" data-target="#signupform"><b>Join Us</b>  <i class="fa fa-user-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <!-- Carousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img class="first-slide img-responsive" src="img1.png" style="opacity: 1;" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="font-family: monospace; font-weight: bold;">Example headline.</h1>
              <p>Sign up and Login to explore the limitless boundary of food world. After login you can be able to review any restaurant.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>

        <div class="item">
          <img class="second-slide img-responsive" src="img2.jpg" style="opacity: 0.9;" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="font-family: monospace; font-weight: bold;">Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>

        <div class="item">
          <img class="third-slide img-responsive" src="img1.png" style="opacity: 0.9;" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="font-family: monospace; font-weight: bold;">One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse Restaurants</a></p>
            </div>
          </div>
        </div>

      </div>
    </div><!-- /.carousel -->

<!--      Form to Input Location, where user wants to search Restaurants-->
      
    <form method="post">
    <div class="container" style="margin-bottom: 30px;">
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group" style="width: 350px;">
            <label for="exampleFormControlSelect1">Select City to Search For Restaurants</label>
            <select class="form-control" id="exampleFormControlSelect1" name="loc">
              <option>Kolkata</option>
              <option>Chennai</option>
              <option>Bangalore</option>
            </select>
        </div>
        </div>
        <div class="col-lg-8">
          <input type="submit" name="search" value="Search" style="margin-top: 25px;"class="btn btn-primary">
        </div>
      </div>
    </div>
    </form>
      
    <!-- Marketing messaging and featurettes -->
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <img class="img-circle img-hover1" src="https://seeklogo.com/images/D/delivery-logo-28C4358E64-seeklogo.com.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Fast Delivery</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>

        <div class="col-lg-4 col-sm-6">
          <img class="img-circle img-hover1" src="https://legionhoster.com/wp-content/uploads/2016/04/Cheap-Prices.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Cheap Price</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 col-sm-12">
          <img class="img-circle img-hover1" src="https://png.pngtree.com/element_pic/17/03/27/91680929a075b689950f44f12e50b46c.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Best Quality</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

      </div><!-- /.row -->

      <hr class="featurette-divider">
        
<!-- About Us-->
      <div class="row featurette" id="about" style="background-color: #f1f1f1;">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading" style="vertical-align: center; color: #000; font-family: monospace;">About us:</h2>
          <p class="lead" style="vertical-align: center;">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo. lorem. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo. lorem</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" src="010.jpg" alt="Generic placeholder image" style="padding: 20px; margin-left: 1px;">
        </div>
      </div>

      <hr class="featurette-divider">
<!--Contact Me-->
      <div class="row featurette" id="contact" style="background-color: #f1f1f1;">
        <div class="col-md-7">
          <h2 class="featurette-heading" style="color: #000; font-family: monospace;">Meet Developer:</h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo. lorem</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="03.jpg" alt="Generic placeholder image" style="padding: 20px;">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2019 Company, Inc. &middot; <a href="https://www.linkedin.com/in/alok-raj-465212100/" target="_blank"><b><i>LinkedIn</i></b></a> &middot; <a href="https://www.facebook.com/profile.php?id=100010071970453" target="_blank"><b><i>Facebook</i></b></a></p>
      </footer>

    </div><!-- /.container -->

    <!-- Modal -->
    <!-- Sign up -->
    
    <div class="modal fade" id="signupform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle"><b>Join Us Here</b></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form id="signup_form" method="post" action="#">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="signup_name1" aria-describedby="nameHelp" placeholder="Enter Name" name="signup_name" required>
              </div>

              <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="signup_email1" aria-describedby="emailHelp" placeholder="Enter email" name="signup_email" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <button type="submit" class="btn btn-primary" name="signup_submit">Join Us</button>
            
          </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Sign up</button> -->
          </div>
        </div>
      </div>
    </div>
  

    <!-- Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
