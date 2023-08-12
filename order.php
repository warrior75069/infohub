<!doctype html>
<html lang="en">

<head>
    <?php
    session_start();
    include('head.php');
    include('connection.php');
    if ($_SESSION['type'] == "admin") {
        header("location: http://localhost/Juhosi%20Software%20Web%20Development/");
    } elseif (empty($_SESSION)) {
        header("location: http://localhost/Juhosi%20Software%20Web%20Development/");
    } elseif ($_SESSION['type'] == "cust") {
    ?>

</head>

<body>
    <?php include("body.php"); ?>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Infohub</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span class="navbar-text">Welcome, <?php echo $_SESSION['id'] ;?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="logout()">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- JavaScript function for logout -->
    <script>
        function logout() {
            window.location = "http://localhost/Juhosi%20Software%20Web%20Development/logout.php";
        }
    </script>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <div class="card rounded shadow shadow-sm p-3">
                            <form class="form" role="form" action="http://localhost/Juhosi%20Software%20Web%20Development/orderrequest.php" method="POST">
                                <div class="row g-3">
                                    <div class="col-12 my-2">
                                        <label for="order_date" class="form-label">Order Date</label>
                                        <input type="date" class="form-control" name="order_date" id="order_date" required="">
                                    </div>
                                    <div class="col-sm-6 my-2">
                                        <label for="company" class="form-label">Company</label>
                                        <input type="text" class="form-control" name="company" id="company" placeholder="" value="" required="">
                                    </div>

                                    <div class="col-sm-6 my-2">
                                        <label for="owner" class="form-label">Owner</label>
                                        <input type="text" class="form-control" id="owner" name="owner" value="" required="">
                                    </div>

                                    <div class="col-sm-6 my-2">
                                        <label for="item" class="form-label">Item</label>
                                        <input type="text" class="form-control" id="item" name="item" value="" required="">
                                    </div>

                                    <div class="col-sm-6 my-2">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="quantity" placeholder="" value="" required="">
                                    </div>

                                    <div class="col-12 my-2">
                                        <label for="weight" class="form-label">Weight</label>
                                        <input type="number" min="0" step="any" class="form-control" name="weight" placeholder="" value="" required="">
                                    </div>

                                    <div class="col-12 my-2">
                                        <label for="request" class="form-label">Request For Shipment</label>
                                        <input type="text" class="form-control" name="request" placeholder="" value="" required="">
                                    </div>

                                    <div class="col-12 my-2">
                                        <label for="track" class="form-label">Tracking ID</label>
                                        <input type="text" class="form-control" name="track" placeholder="" value="" required="">
                                    </div>

                                    <div class="col-12 my-2">
                                        <label for="ship" class="form-label">Shipment Size <span>(Enter dimensions in the format l*b*h)</span></label>
                                        <input type="text" class="form-control" pattern="\d+(\.\d+)?\*\d+(\.\d+)?\*\d+(\.\d+)?" title="Please enter value in the l*b*h format" name="ship">
                                    </div>
                                    
                                    <div class="col-12 my-2">
                                        <label for="count" class="form-label">Box Count</label>
                                        <input type="number" class="form-control" name="count" placeholder="" value="" required="">
                                    </div>
                                    <div class="col-12 my-2">
                                        <label for="specification" class="form-label">Specification</label>
                                        <input type="text" class="form-control" name="specification" placeholder="" value="" required="">
                                    </div>
                                    <div class="col-12 my-2">
                                        <label for="check" class="form-label">Cheklist Quantity</label>
                                        <input type="text" class="form-control" name="check" placeholder="" value="" required="">
                                    </div>
                                    <button class="w-100 btn btn-primary btn-lg mx-3 my-2" type="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php } ?>

</html>