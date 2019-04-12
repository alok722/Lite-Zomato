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
    <script src="ie-emulation-modes-warning.js">
    </script>
      <script>
          
//          Setting value of rating 5 if some one inputs more than 5
          function fun()
          {
              var rate=document.getElementById("rate1").value;
              if(rate>=5)
                  {
                      document.myform.rate.value='5';
                  }
              if(rate<=0)
                  {
                      document.myform.rate.value='0';
                  }
          }
      </script>

    <!-- Custom styles for this template -->
    <link href="details.css" rel="stylesheet">
    <?php
      session_start();
      
      $resname=$_SESSION['resname'];
      $con=mysql_connect('localhost','root','');
      if(!$con)
       {
        die('could not connect: '.mysql_error());
       }
       mysql_select_db("hotel",$con);
      
//      Fetching Restaurant address
      $res=mysql_query("select restro_add from detail where restro_name='$resname'",$con);
      $row=mysql_fetch_assoc($res);
      $result=$row['restro_add'];
      
//      Sumitting Review
      
      if(isset($_POST['btnsubmit']))
        {
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $name=$_POST['txtName'];
                $u_id=$_POST['txtEmail'];
                $rate=$_POST['rate'];
                $msg=$_POST['txtMsg'];
                
                $valid=mysql_query("select u_id from user where u_id='$u_id'",$con);
                
                if(mysql_num_rows($valid)==0)
                {
                    $msg="Join us first by going to home page.";
                    echo "<script type='text/javascript'>alert('$msg');</script>";
                    
                }
                else
                {
                    $review="insert into review values('$name','$u_id','$rate','$msg','$resname')";
                    $res=mysql_query($review,$con);
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
        
<!--        Header-->
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-4 col-xs-6 col-md-4">
          <img src="04.jpg" class="rounded float-left img-responsive" style="height: 200px; padding-bottom: 10px;">
        </div>
        <div class="col-lg-8 col-sm-8 col-xs-6 col-md-8">
          <h2 style="color: #f1f1f1"><?php echo "$resname"; ?></h2>
          <p style="color: #c9c9c9"><?php echo "$result"; ?></p><br>
          <p style="color: #c9c9c9">North Indian, Chinese</p>
          <h3 style="color: #fff"><span style="color: gold;">*</span> 4.3</h3>
        </div>
      </div>
    </div>
    </div>
      
<!--      Food Menu-->

    <div class="container">
      <h2 style="color: #171a29; font-weight: bold; font-family: monospace;">Food Menus:</h2>
      <div class="row" style="margin-top: 20px;">

        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6" >
          <div class="card" style="width: 18rem;">
            <img class="card-img-top img-responsive" src="001.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Chilli Fish</h4>
              <p class="card-text">Price: ₹159/- </p>
              <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Add To Cart</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6" >
          <div class="card" style="width: 18rem;">
            <img class="card-img-top img-responsive" src="002.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Chilli Chicken</h4>
              <p class="card-text">Price: ₹299/- </p>
              <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Add To Cart</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top img-responsive" src="001.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Paneer Chilli</h4>
              <p class="card-text">Price: ₹219/- </p>
              <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Add To Cart</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top img-responsive" src="004.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Chicken Manchurian</h4>
              <p class="card-text">Price: ₹319/- </p>
              <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Add To Cart</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6" >
          <div class="card" style="width: 18rem;">
            <img class="card-img-top img-responsive" src="001.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Garlic Chicken</h4>
              <p class="card-text">Price: ₹269/- </p>
              <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Add To Cart</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6" >
          <div class="card" style="width: 18rem;">
            <img class="card-img-top img-responsive" src="001.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Chicken Kasha</h4>
              <p class="card-text">Price: ₹329/- </p>
              <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Add To Cart</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top img-responsive" src="002.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Chicken Rezala</h4>
              <p class="card-text">Price: ₹329/- </p>
              <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Add To Cart</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top img-responsive" src="007.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Gajar Halwa</h4>
              <p class="card-text">Price: ₹519/- </p>
              <a href="#" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">Add To Cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
          <div class="container contact-form">
            <div class="contact-image">
            </div>
            <form method="post" onsubmit="fun();" name="myform">
                <h3 style="padding-top: 25px; margin-bottom: 20px;">Drop Us your Experience</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="number" id="rate1" name="rate" class="form-control" placeholder="Rate us out of 5 *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnsubmit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>

        <div class="container">
          <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 style="text-align: center; margin-bottom: 20px; margin-top: 20px; color: #0066c2">Past Reviews</h2>
     
          <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col" style="background-color: #171a29; color: #f1f1f1">Name</th>
              <th scope="col" style="background-color: #171a29; color: #f1f1f1">Email</th>
              <th scope="col" style="background-color: #171a29; color: #f1f1f1">Rate</th> 
              <th scope="col" style="background-color: #171a29; color: #f1f1f1">Review</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $res=mysql_query("select name,u_id,rate,msg from review where restro_name='$resname'",$con);
          while($row=mysql_fetch_assoc($res))
          {
          ?>
        <tr>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['u_id'];?></td>
          <td><?php echo $row['rate'];?></td>
          <td><?php echo $row['msg'];?></td>    
        </tr>

        <?php
          }
         ?>
      </tbody>
     </table>
    </div>
</div>
          <!-- FOOTER -->
      <footer style="margin-top: 30px;">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
        </div>

   

    <!-- Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
