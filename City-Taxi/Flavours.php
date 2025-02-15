<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Models</title>
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
                    <a class="nav-link" href="Models.php">Models</a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"></li>
                        <li class="nav-item"><a class="nav-link" href="History.php">History&nbsp;</a></li>
                    </ul>
                </div>
            </nav>

            <h1 class="text-center">Car Models</h1>
            <p class="text-center">Best Service, Best Products, Unbeatable Prices</p>
            <p class="text-center">Check out our available car models below:</p>

            <!-- First Car Model -->
            <div class="row">
                <div class="offset-lg-0 col-lg-1"><img src="images/car1.jpg" alt="" width="400" height="306" class="rounded-circle"/></div>
                <div class="col-lg-6 offset-lg-5">
                    <p>&nbsp;</p>
                    <p class="text-uppercase text-center"><strong>Tesla Model S</strong></p>
                    <p>The Tesla Model S is an all-electric five-door liftback sedan produced by Tesla, Inc. It is known for its acceleration, range, and cutting-edge technology. With up to 412 miles of range, it’s perfect for long drives.</p>
                </div>
            </div>
            <br>

            <!-- Second Car Model -->
            <div class="row">
                <div class="col-lg-1 offset-lg-0"><img src="images/car2.jpg" alt="" width="400" height="306" class="rounded-circle"/></div>
                <div class="offset-lg-5 col-lg-6">
                    <p>&nbsp;</p>
                    <p class="text-center"><strong>Ford Mustang</strong></p>
                    <p>The Ford Mustang is a series of American automobiles manufactured by Ford. The car is currently in its sixth generation and is known for its powerful performance, sleek design, and iconic status.</p>
                </div>
            </div>
            <br>

            <!-- Third Car Model -->
            <div class="row">
                <div class="col-lg-6"><img src="images/car3.jpg" alt="" width="400" height="306" class="rounded-circle"/></div>
                <div class="col-lg-6">
                    <p>&nbsp;</p>
                    <p class="text-uppercase text-center"><strong>BMW 3 Series</strong></p>
                    <p>The BMW 3 Series is a compact executive car manufactured by the German automaker BMW. Known for its performance and handling, it continues to set the standard in the luxury sedan market.</p>
                </div>
            </div>
            <br>

            <!-- Fourth Car Model -->
            <div class="row">
                <div class="col-lg-6"><img src="images/car4.jpg" alt="" width="400" height="306" class="rounded-circle"/></div>
                <div class="col-lg-6">
                    <p class="text-center"><strong>Audi A4</strong></p>
                    <p>The Audi A4 is a line of compact executive cars produced since 1994 by the German car manufacturer Audi, a subsidiary of the Volkswagen Group. It is well-regarded for its technology, comfort, and design.</p>
                </div>
            </div>
            <br>

            <!-- Footer -->
            <button type="button" class="btn btn-lg"><a href="index.php">Go Back To Home&nbsp;</a></button>
            <br><br>
            <footer></footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    Copyright &copy; 2022 All rights reserved
                </div>
                <br><br>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery-3.4.1.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script> 
        <script src="js/bootstrap-4.4.1.js"></script>
    </div>
</body>
</html>
