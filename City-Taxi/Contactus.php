<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span> 
          </button>
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <a class="nav-link" href="Contactus.php">Contact us</a>
            <a class="nav-link" href="Flavours.php">Models</a>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active"></li>
              <li class="nav-item"> <a class="nav-link" href="History.php">History&nbsp;</a> </li>
              <li class="nav-item dropdown">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
                  <a class="dropdown-item" href="#">Action</a> 
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a> 
                </div>
              </li>
              <li class="nav-item"></li>
            </ul>
            <form class="form-inline my-2 my-lg-0"></form>
          </div>
        </nav>
        
        <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: grey">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active col-lg-12"> 
              <img src="images/10.jpg" alt="First slide" width="905" height="650" class="d-block mx-auto">            
            </div>
          </div>
        </div>

        <h1 class="text-center">&nbsp;</h1>
        <h1 class="text-center">Contact Us</h1>
        <p class="text-center">Best Service, Best Product, Less Price</p>
        <p class="text-center">You can contact our organization through all the ways mentioned below.&nbsp;</p>
        
        <div class="row">
          <div class="col-lg-1 offset-lg-4">
            <img src="images/instagram-logo.png" alt="" width="50" height="40" class="img-thumbnail"/>
          </div>
          <div class="col-lg-6">
            <a href="https://www.instagram.com">Click here for Instagram</a>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-lg-1 offset-lg-4">
            <img src="images/Facebook-logo.png" alt="" width="50" height="40" class="img-thumbnail"/>
          </div>
          <div class="col-lg-3">
            <a href="http://www.facebook.com">Click here for Facebook</a>
          </div>
        </div>

        <br>
        <br>

        <button type="button" class="btn btn-lg">
          <a href="index.php">Go Back To Home&nbsp;</a>
        </button>

        <br>
        <br>
        <br>

        <footer></footer>

        <div class="row">
          <div class="col-lg-12 text-center">
            <?php echo "Copyright &copy; " . date("Y") . " All rights reserved"; ?>
          </div>
        </div>

        <br>
        <br>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
